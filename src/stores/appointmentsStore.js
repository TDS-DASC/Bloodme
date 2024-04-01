import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useCachedDataStoreAppointments = defineStore({
  id: 'appointmentsData',
  state: () => ({
    appointmentsTable: [],
    dataLoaded: false,
  }),
  actions: {
    setAppointmentsData(data) {
      this.appointmentsTable = data;
    },
    async fetchData() {
      if (!this.dataLoaded) {
        try {
          const response = await axios.get(`/api/appointments`);
          response.data.forEach(appointment => {
            this.appointmentsTable.push(appointment);
          });
          this.dataLoaded = true;
        } catch (error) {
          console.error('Error in request api beneficiaries', error);
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
      try {
        this.appointmentsTable = [];
        const response = await axios.get(`/api/appointments`);
        this.setAppointmentsData(response.data);
      } catch (error) {
        console.error('Error refreshing data:', error);
      }
    },
  },
});