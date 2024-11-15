// @ts-ignore
import { useState } from '#app'

export const useAppState = () => {
    const state = useState('siteData', () => ({
        nav: [],
        pages: {}
    }))

    const updateState = (newData) => {
        state.value = newData
    }

    return {
        nav: computed(() => state.value.nav),
        pages: computed(() => state.value.pages),
        updateState
    }
}