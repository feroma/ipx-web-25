// @ts-ignore
import { useState } from '#app'

export const useAppState = () => {
    const state = useState('siteData', () => ({
        nav: [],
        pages: {},
        currentPageId:null,
        currentSectionId:null,
    }))

    const updateState = (newData) => {
        state.value = newData
    }
    const updateCurrentPage = (newId) => {
        state.value.currentPageId = newId
    }

    return {
        nav: computed(() => state.value.nav),
        pages: computed(() => state.value.pages),
        currentPageId: computed(() => state.value.currentPageId),
        updateState,
        updateCurrentPage
    }
}