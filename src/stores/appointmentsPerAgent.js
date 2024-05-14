import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreAppointmentsPerAgent = defineStore({
  id: 'cachedDataAppointmentPerAgent',
  state: () => ({
    appointmentsPerAgentTable: [],
    dataLoaded: false,
  }),
  actions: {
    setAppointmentsPerAgentData(data) {
      this.appointmentsPerAgentTable = data;
    },
    async fetchData() {
      let agentHospital = 0;
      const userDataString = localStorage.getItem('user');
      const userData = JSON.parse(userDataString);
      agentHospital = userData.hospital_id;
      if (!this.dataLoaded && this.appointmentsPerAgentTable.length == 0) {
        try {
          const response = await axios.get(`/api/hospitals/${agentHospital}/appointments`);
          response.data.forEach(appointmentPerAgent => {
            this.appointmentsPerAgentTable.push(appointmentPerAgent);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api appointmentPerAgents', error);
          if (error.response && error.response.status === 401 || error.code == 'ERR_NETWORK' || error.code =='ERR_CONNECTION_REFUSED') {
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
      try {
        this.appointmentsPerAgentTable = [];
        const response = await axios.get(`/api/hospitals/${1}/appointments`);
        this.setAppointmentsPerAgentData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});