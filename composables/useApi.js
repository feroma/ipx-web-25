import { useAppState } from './useAppState'

export const useApi = () => {
    const config = useRuntimeConfig()
    const { updateState } = useAppState()

    const fetchData = async () => {
        try {
            console.log(`Fetching data from: ${config.public.apiBase}`)
            const response = await fetch(`${config.public.apiBase}`)

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