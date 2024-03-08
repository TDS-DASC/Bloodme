import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useParticipantsStore = defineStore({
  id: 'participantsData',
  state: () => ({
    participantsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setParticipantsData(data) {
      this.participantsTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded) {
        try {
          const response = await axios.get(`/api/participants`);
          response.data.forEach(participant => {
            this.participantsTable.push(participant);
          });
          this.setParticipantsData(response.data);
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api participants', error);
        }
      }
    },
    pushElementToParticipants(element) {
      this.participantsTable.push(element);
    },
  },
});