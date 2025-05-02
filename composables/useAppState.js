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
    const updateCurrentPage = (pageId) => {
        state.value.currentPageId = pageId
        // Reset currentSectionId quando cambia pagina
        state.value.currentSectionId = null
    }
    const updateCurrentSection = (sectionId) => {
        state.value.currentSectionId = sectionId
    }

    return {
        nav: computed(() => state.value.nav),
        pages: computed(() => state.value.pages),
        currentPageId: computed(() => state.value.currentPageId),
        currentSectionId: computed(() => state.value.currentSectionId),
        updateState,
        updateCurrentPage,
        updateCurrentSection
    }
}