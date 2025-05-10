import { useAppState } from './useAppState'

export const useApi = () => {
    const config = useRuntimeConfig()
    const { updateState } = useAppState()
    const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms))

    // Imposta la modalità debug
    const DEBUG = true

    // Importa i file JSON locali se in modalità debug
    const getLocalData = async (action) => {
        if (action === "get_website_data") {
            return await import('~/content/general.json').then(m => m.default || m)
        } else if (action === "get_page") {
            return await import('~/content/home.json').then(m => m.default || m)
        }
        return null
    }

    const fetchData = async (payload) => {
        try {
            // Se siamo in modalità debug, usa i file locali
            if (DEBUG) {
                console.log('DEBUG MODE: Using local JSON files instead of API')
                const localData = await getLocalData(payload.action)

                if (localData) {
                    console.log("Using local data for action:", payload.action)
                    console.log("RESPONSE:", localData)
                    return localData
                } else {
                    console.warn("No local data found for action:", payload.action)
                }
            }

            console.log(`Fetching data from: ${config.public.apiBase}`, payload)

            /*if(payload.action === 'get_page'){
                console.log(`========= Start Await`)
                await delay(20000)
                console.log(`========= Awaiting passed`)
            }*/

            const response = await fetch(`${config.public.apiBase}`,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    // Il tuo oggetto payload
                    payload,
                })
            })

            if (!response.ok) {
                const errorText = await response.text()
                console.error('API request failed:', response.status, errorText)
                throw new Error(`API request failed with status code ${response.status}`)
            }

            const data = await response.json()
            console.log("Fetched data", data)
            return data
        } catch (error) {
            console.error('Error fetching data:', error)
            throw error
        }
    }

    return {
        fetchData
    }
}