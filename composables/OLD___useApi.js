import { useAppState } from './useAppState'

export const useApi = () => {
    const config = useRuntimeConfig()
    const { updateState } = useAppState()
    const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms))
    const fetchData = async (payload) => {
        try {


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