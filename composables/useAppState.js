// @ts-ignore
import { useState } from '#app'

export const useAppState = () => {
    const state = useState('siteData', () => ({
        nav: [],
        pages: {},
        config: {},
        currentPageId:null,
        currentSectionId:null,
        menuOpen:null,
        menuMobileOpen:null,
        hideOverflow:null,
        contactFormOpen:null,
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
    const toggleMenuStatus = () => {
        state.value.menuOpen = !state.value.menuOpen
    }
    const changeMenuStatus = (status) => {
        state.value.menuOpen =status
    }
    const changeMenuMobileStatus = (status) => {
        state.value.menuMobileOpen =status
    }
    const changeHideOverflow = (status) => {
        state.value.hideOverflow =status
    }
    const changeContactForm = (status) => {
        state.value.contactFormOpen =status
    }
    changeMenuStatus(true);
    return {
        nav: computed(() => state.value.nav),
        pages: computed(() => state.value.pages),
        config: computed(() => state.value.config),
        currentPageId: computed(() => state.value.currentPageId),
        currentSectionId: computed(() => state.value.currentSectionId),
        menuOpen: computed(() => state.value.menuOpen),
        menuMobileOpen: computed(() => state.value.menuMobileOpen),
        hideOverflow: computed(() => state.value.hideOverflow),
        contactFormOpen: computed(() => state.value.contactFormOpen),
        updateState,
        updateCurrentPage,
        updateCurrentSection,
        toggleMenuStatus,
        changeMenuStatus,
        changeMenuMobileStatus,
        changeHideOverflow,
        changeContactForm
    }
}