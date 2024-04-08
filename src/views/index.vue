<template>
    <div class="flex dark:bg-slate-900 gap-2" style="height: 85vh;">
      <!-- Citas pendientes -->
      <div class="flex flex-col rounded-md bg-gray-100 overflow-hidden min-w-fit dark:bg-slate-800 w-1/6">
        <div name="header" class="text-center bg-slate-700 dark:bg-slate-700 text-white dark:text-white text-3xl p-1 font-semibold">
          Citas pendientes
        </div>
        <div class="flex items-center pr-2 dark:bg-slate-800 bg-white">
          <div class="flex flex-1 items-center m-2 bg-white rounded-xl overflow-hidden border-2 border-black-400 border-solid">
            <Icon icon="material-symbols-light:search" style="font-size: 180%; font-weight: bold; color: gray;"/>
            <input class="p-2 w-full focus:outline-none" placeholder="Buscar...">
          </div>
          <button class="hover:bg-gray-300 rounded-md dark:bg-slate-300 dark:hover:bg-gray-100">
            <Icon icon="system-uicons:filtering" style="font-size: 180%; font-weight: bold; color: darkslategray;"/>
          </button>
        </div>
        
        <div class="bg-white dark:bg-slate-800 h-full p-2 pb-10 overflow-auto gap-2 flex flex-col">
          
          <!-- Separador de horas -->
          <!-- <div class="flex justify-center items-center">
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
            <p class="px-5 dark:text-white">5:00pm</p>
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
          </div> -->

          <div class="flex justify-center items-center">
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
            <p class="px-5 dark:text-white">Pendientes</p>
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
          </div>

          <div v-for="(appointment, index) in combinedDataRef" :key="index">
            <button class="flex bg-white border-2 border-gray-200 hover:bg-gray-200 dark:bg-slate-800 dark:hover:bg-slate-700 p-2 rounded-xl items-center select-none transition duration-300" :class="{ 'bg-gray-200': selectedImageIndex == index }"  @click="showPatientInformation(appointment, index)" v-if="appointment.appointment_status == 'pending'">
              <div class="relative w-1/4 flex justify-center items-center dark:bg-white dark:rounded-md dark:w-fit">
                <img :src="bloodbag" alt="" class="max-h-16" />
                <p class="absolute top-5 text-xs font-bold text-black-900">{{ appointment.user_blood_type ? appointment.user_blood_type : '¿?' }}</p>
              </div>
              <div class="flex flex-col justify-start text-start px-4 w-full">
                <div class="flex items-center justify-between gap-4 w-full dark:text-white">
                  <p class="font-bold text-xl dark:text-white">{{ appointment.user_name }} {{ appointment.user_lastname }}</p>
                  <div class="flex gap-2">
                    <Icon icon="mdi:eye" style="font-size: 120%;" />
                  </div>
                </div>
                <div class="flex items-center dark:text-gray-300">
                  <Icon icon="mdi:location" />
                  <p class="flex-2 max-w-xs">{{ appointment.hospital_name }}</p>
                </div>
                <div class="flex items-center dark:text-gray-300">
                  <Icon icon="material-symbols-light:description-outline" style="font-size: 140%;" />
                  <p class="flex-2 max-w-xs">{{ appointment.description }} Unidades</p>
                </div>
              </div>
            </button>
          </div>

          <div class="flex justify-center items-center">
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
            <p class="px-5 dark:text-white">Canceladas</p>
            <div class="border-b-2 border-solid border-black-300 w-full"></div>
          </div>

          <div v-for="(appointment, index) in combinedDataRef" :key="index">
            <button class="flex bg-white border-2 border-gray-200 hover:bg-gray-200 dark:bg-slate-800 dark:hover:bg-slate-700 p-2 rounded-xl items-center select-none transition duration-300" :class="{ 'bg-gray-200': selectedImageIndex == index }"  @click="showPatientInformation(appointment, index)" v-if="appointment.appointment_status == 'cancelled'">
              <div class="relative w-1/4 flex justify-center items-center dark:bg-white dark:rounded-md dark:w-fit">
                <img :src="bloodbag" alt="" class="max-h-16" />
                <p class="absolute top-5 text-xs font-bold text-black-900">{{ appointment.user_blood_type ? appointment.user_blood_type : '¿?' }}</p>
              </div>
              <div class="flex flex-col justify-start text-start px-4 w-full">
                <div class="flex items-center justify-between gap-4 w-full dark:text-white">
                  <p class="font-bold text-xl dark:text-white">{{ appointment.user_name }} {{ appointment.user_lastname }}</p>
                  <div class="flex gap-2">
                    <Icon icon="mdi:eye" style="font-size: 120%;" />
                  </div>
                </div>
                <div class="flex items-center dark:text-gray-300">
                  <Icon icon="mdi:location" />
                  <p class="flex-2 max-w-xs">{{ appointment.hospital_name }}</p>
                </div>
                <div class="flex items-center dark:text-gray-300">
                  <Icon icon="material-symbols-light:description-outline" style="font-size: 140%;" />
                  <p class="flex-2 max-w-xs">{{ appointment.description }} Unidades</p>
                </div>
              </div>
            </button>
          </div>

        </div>
      </div>

      <!-- Información del paciente -->
      <div class="flex-auto rounded-md overflow-auto bg-white dark:bg-gray-800">
        <div name="header" class="text-start bg-slate-700 text-black text-3xl dark:bg-slate-800">
          <div name="header" class="bg-slate-700 dark:bg-slate-700 flex justify-between">
            <div class="text-white dark:text-white text-3xl px-4 py-4 font-semibold">
              Información de la cita
            </div>
            <div class="text-white dark:text-white text-2xl px-4 py-4 font-semibold">
              {{ appointment_date }}
            </div>
          </div>
        </div>
        <br>
        <div class="p-4">
          <div class="px-3 py-2">
            <p class="font-semibold text-gray-600 text-2xl dark:text-white dark:border-b-2 border-b-2">Datos del donador</p>
            <div class="w-full rounded-sm p-3 border-opacity-10 gap-5 flex flex-col">
              <div class="flex gap-2 w-full ">
                <Textinput
                  label="Nombre/s"
                  type="text"
                  placeholder=""
                  name="name"
                  v-model="name"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Apellidos"
                  type="text"
                  placeholder=""
                  name="lastName"
                  v-model="lastName"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
              </div>
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Fecha de nacimiento"
                  type="text"
                  placeholder=""
                  name="birthDate"
                  v-model="birthDate"
                  classInput="h-[48px] dark:text-white"
                  class="w-1/2"
                  disabled
                />
                <Textinput
                  label="CURP"
                  type="text"
                  placeholder=""
                  name="curp"
                  v-model="curp"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Tipo de sangre"
                  type="text"
                  placeholder=""
                  name="bloodType"
                  v-model="bloodType"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
              </div>
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Sexo"
                  type="text"
                  placeholder=""
                  name="sex"
                  v-model="sex"
                  classInput="h-[48px] dark:text-white"
                  class="w-1/2"
                  disabled
                />
                <Textinput
                  label="Alias"
                  type="text"
                  placeholder=""
                  name="alias"
                  v-model="alias"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
              </div>
            </div>
          </div>
          <br>
          <div class="px-3 py-2">
            <p class="font-semibold text-gray-600 text-2xl dark:text-white dark:border-b-2 border-b-2">Información de contacto</p>
            <div class="w-full rounded-sm p-3 border-opacity-10 gap-5 flex flex-col">
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Email"
                  type="text"
                  placeholder=""
                  name="email"
                  v-model="email"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Número de telefono celular"
                  type="text"
                  placeholder=""
                  name="phoneNumber"
                  v-model="phoneNumber"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
              </div>
            </div>
          </div>
          <br>
          <div class="px-3 py-2">
            <p class="font-semibold text-gray-600 text-2xl dark:text-white dark:border-b-2 border-b-2">Información de Campaña</p>
            <div class="w-full rounded-sm p-3 border-opacity-10 gap-5 flex flex-col">
              <div class="flex gap-2 w-full">
                <Textinput
                  label="Nombre del beneficiario"
                  type="text"
                  placeholder=""
                  name="email"
                  v-model="campaign_beneficiary"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Bolsas requeridas"
                  type="text"
                  placeholder=""
                  name="phoneNumber"
                  v-model="campaign_needed_bags"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
                <Textinput
                  label="Bolsas recolectadas"
                  type="text"
                  placeholder=""
                  name="phoneNumber"
                  v-model="campaign_recollected_bags"
                  classInput="h-[48px] dark:text-white"
                  class="w-full"
                  disabled
                />
              </div>
            </div>
          </div>
          <br>
          <div class="full flex justify-end gap-2">
            <button type="button" class="btn bg-black-700 hover:bg-black-800 text-white block w-fit text-center" @click="cancelledAppointment" v-if="appointment_status != 'cancelled'">
              Cita cancelada
            </button>
            <button type="button" class="btn bg-slate-400 hover:bg-slate-500 text-white block w-fit text-center">
              Cita completada con retardo
            </button>
            <button type="button" class="btn bg-green-500 hover:bg-green-600 text-white block w-fit text-center">
              Cita completada
            </button>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
  import bloodbag from "@/assets/images/all-img/BloodBag.png";
  import Textinput from "@/components/Textinput";
  import Icon from "../components/Icon";
  import { useCachedDataStoreAppointments } from '../stores/appointmentsStore';
  import { useCachedDataStoreUsers } from '../stores/usersStore';
  import { useCachedDataStoreCampaigns } from '../stores/campaignsStore';
  import { useCachedDataStoreBeneficiaries } from '../stores/beneficiariesStore';
  import { useCachedDataStoreHospitals } from '../stores/hospitalsStore';
  import { ref } from "vue";
  import axios from "@/plugins/axios";
  import { useToast } from "vue-toastification";

  export default {
    components: {
      Icon,
      Textinput,
    },
    data() {
      return {
        bloodbag,
      };
    },
    setup() {

      const { appointmentsTable } = useCachedDataStoreAppointments();
      const { usersTable } = useCachedDataStoreUsers();
      const { campaignsTable } = useCachedDataStoreCampaigns();
      const { beneficiariesTable } = useCachedDataStoreBeneficiaries();
      const { hospitalsTable } = useCachedDataStoreHospitals();
      const combinedDataRef = ref([]);

      async function fetchData() {
        await useCachedDataStoreAppointments().fetchData();
        await useCachedDataStoreUsers().fetchData();
        await useCachedDataStoreCampaigns().fetchData();
        await useCachedDataStoreBeneficiaries().fetchData();
        await useCachedDataStoreHospitals().fetchData();

        const combinedData = appointmentsTable.map(appointment => {
          const user = usersTable.find(user => user.id === appointment.user_id);
          const campaign = campaignsTable.find(campaign => campaign.id === appointment.campaign_id);
          const beneficiary = beneficiariesTable.find(beneficiary => beneficiary.id === campaign.beneficiary_id);
          const hospital = hospitalsTable.find(hospital => hospital.id === campaign.hospital_id);
          return { 
            appointment_id: appointment.id,
            appointment_date : appointment.date,
            appointment_status : appointment.status,
            datetime: appointment.datetime,
            description: appointment.description,
            user_id: user ? user.id : '',
            user_name: user ? user.name : '', 
            user_lastname: user ? user.lastname : '', 
            user_email: user ? user.email : '', 
            user_alias: user ? user.alias : '', 
            user_birth_date: user ? user.birth_date : '', 
            user_image_url: user ? user.image_url : '',
            user_sex: user ? user.sex : '',
            user_phone_number: user ? user.phone_number : '',
            user_curp: user ? user.curp : '',
            user_blood_type: user ? user.blood_type : '',
            campaign_id: campaign ? campaign.id : '',
            campaign_required_bags: campaign ? campaign.required_bags : '',
            campaign_recollected_bags: campaign ? campaign.recollected_bags : '',
            campaign_required_platelets: campaign ? campaign.required_platelets : '',
            campaign_recollected_platelets: campaign ? campaign.recollected_platelets : '',
            campaign_description: campaign ? campaign.description : '',
            campaign_beneficiary_id: campaign ? campaign.beneficiary_id : '',
            campaign_hospital_id: campaign ? campaign.hospital_id : '',
            beneficiary_name: beneficiary ? beneficiary.name : '',
            beneficiary_lastname: beneficiary ? beneficiary.lastname : '',
            beneficiary_curp: beneficiary ? beneficiary.curp : '',
            beneficiary_blood_type: beneficiary ? beneficiary.blood_type : '',
            hospital_name: hospital ? hospital.name : '',
            hospital_name: hospital ? hospital.address : '',
          };
        });

        combinedDataRef.value = combinedData;
      }

      fetchData();

      let appointmentId = ref('');
      let name = ref('');
      let lastName = ref('');
      let birthDate = ref('');
      let curp = ref('');
      let bloodType = ref('');
      let sex = ref('');
      let alias = ref('');
      let email = ref('');
      let phoneNumber = ref('');
      let campaign_beneficiary = ref('');
      let campaign_needed_bags = ref('');
      let campaign_recollected_bags = ref('');
      let appointment_date = ref('');
      let appointment_status = ref('');
      
      let selectedImageIndex = ref(null);
      function showPatientInformation(appointment, index){
        selectedImageIndex.value = index;
        console.log(selectedImageIndex.value)

        appointmentId.value = appointment.appointment_id;
        name.value = appointment.user_name ? appointment.user_name : 'No registrado';
        lastName.value = appointment.user_lastname ? appointment.user_lastname : 'No registrado';
        birthDate.value = appointment.user_birth_date ? appointment.user_curp : 'No registrado';
        curp.value = appointment.user_curp ? appointment.user_curp : 'No registrado';
        bloodType.value = appointment.user_blood_type ? appointment.user_blood_type : 'No registrado';
        sex.value = appointment.user_sex ? appointment.user_sex : 'No registrado';
        alias.value = appointment.user_alias ? appointment.user_alias : 'No registrado';
        email.value = appointment.user_email ? appointment.user_email : 'No registrado';
        phoneNumber.value = appointment.user_phone_number ? appointment.user_phone_number : 'No registrado';
        campaign_beneficiary.value = appointment.beneficiary_name ? appointment.beneficiary_name : 'No registrado';
        campaign_needed_bags.value = appointment.campaign_required_bags ? appointment.campaign_required_bags : 'No registrado';
        campaign_recollected_bags.value = appointment.campaign_recollected_bags ? appointment.campaign_recollected_bags : 'No registrado';
        appointment_date.value = appointment.appointment_date ? appointment.appointment_date : 'No registrado';
        appointment_status.value = appointment.appointment_status;
      }

      const toast = useToast();
      function cancelledAppointment(){
        let selectedAppointment = null;
        if(appointmentId.value){
          selectedAppointment = combinedDataRef.value.find((appointment) => appointment.appointment_id == appointmentId.value);
          const datetime = selectedAppointment.appointment_date;
          const datetimeWithoutSeconds = datetime.substring(0, datetime.lastIndexOf(':'));
          const appointmentData  = [
                      { name: 'date', value: datetimeWithoutSeconds },
                      { name: 'description', value: selectedAppointment.description },
                      { name: 'status', value: "cancelled" },
                      { name: 'campaign_id', value: selectedAppointment.campaign_id },
                      { name: 'user_id', value: selectedAppointment.user_id },
                  ];
          const formattedData = {};
          appointmentData.forEach(item => {
              formattedData[item.name] = item.value;
          });
          axios.put(`/api/appointments/${appointmentId.value}`, formattedData)
                  .then(res => {
                      console.log(res);
                      useCachedDataStoreAppointments().refreshData();
                      selectedAppointment.appointment_status = 'cancelled';
                      toast.success("¡Cita cancelada correctamente!", { timeout: 1000 });
                  })
                  .catch(error => {
                      console.log(formattedData);
                      toast.error("Ha ocurrido un error inesperado.", { timeout: 2000 });
                      if (error.response && error.response.data) {
                          const responseData = error.response.data;
                          errorMessage.value = responseData.message || 'An error occurred.';
                      } else {
                          errorMessage.value = 'An error occurred.';
                      }
                  });
        }
      }

      return {
        cancelledAppointment,
        selectedImageIndex,
        appointment_date,
        campaign_recollected_bags,
        campaign_beneficiary,
        appointment_status,
        campaign_needed_bags,
        showPatientInformation,
        combinedDataRef,
        name,
        lastName,
        birthDate,
        curp,
        bloodType,
        sex,
        alias,
        email,
        phoneNumber,
        appointmentsTable,
        usersTable
      }
    }
  };
</script>
<style lang="css">
</style>
