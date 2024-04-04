import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreParticipants = defineStore({
  id: 'cachedDataParticipants',
  state: () => ({
    participantsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setParticipantsData(data) {
      this.participantsTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded && this.participantsTable.length == 0) {
        try {
          const response = await axios.get(`/api/participants`);
          response.data.forEach(participant => {
            this.participantsTable.push(participant);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api participants', error)
          if (error.response && error.response.status === 401) {
            this.logout();
          }
        }
      }
    },
    logout() {
      localStorage.removeItem('user');
      window.location.href = '/login';
    },
    async refreshData() {
      /* console.log("refresh"); */
      try {
        this.participantsTable = [];
        const response = await axios.get(`/api/participants`);
        this.setParticipantsData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});