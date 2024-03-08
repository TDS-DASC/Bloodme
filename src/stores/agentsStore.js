import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useAgentsStore = defineStore({
  id: 'agentsData',
  state: () => ({
    agentsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setAgentsData(data) {
      this.agentsTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded) {
        try {
          const response = await axios.get(`/api/agents`);
          response.data.forEach(agent => {
            this.agentsTable.push(agent);
          });
          this.setAgentsData(response.data);
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api agents', error);
        }
      }
    },
    pushElementToAgents(element) {
      this.agentsTable.push(element);
    },
  },
});