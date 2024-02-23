import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStore = defineStore({
  id: 'cachedData',
  state: () => ({
    participantsTable: [],
    administratorsTable: [],
    agentsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setParticipantsData(data) {
      this.participantsTable = data;
    },
    setAdministratorsData(data) {
      this.administratorsTable = data;
    },
    setAgentsData(data) {
      this.agentsTable = data;
    },
    checkUserType(user) {
      return user.role;
    },
    async fetchData() {
      if (!this.dataLoaded) {
        try {
          const userTypeFunction = {
            administrator: this.pushElementToAdministrators,
            participant: this.pushElementToParticipants,
            agent: this.pushElementToAgents,
          };

          const response = await axios.get(`http://127.0.0.1:8000/api/users`);
          response.data.forEach(user => {
            const userType = this.checkUserType(user);
            const handler = userTypeFunction[userType];
            handler(user);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api users', error);
        }
      }
    },
    pushElementToAgents(element) {
      this.agentsTable.push(element);
    },
    pushElementToAdministrators(element) {
      this.administratorsTable.push(element);
    },
    pushElementToParticipants(element) {
      this.participantsTable.push(element);
    },
  },
});
