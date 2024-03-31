<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Editar Campaña</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            <form
                @submit.prevent="onSubmit"
                class="lg:grid-cols-2 grid gap-5 grid-cols-1"
            >
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Bolsas requeridas *"
                        type="number"
                        placeholder="Ingrese el número de bolsas requeridas"
                        name="required_bags"
                        v-model="required_bags"
                        :error="required_bagsError"
                    />
                    <p v-if="errors.required_bags" class="mt-2 text-danger-500 block text-sm">{{ errors.required_bags[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Bolsas recolectadas *"
                        type="number"
                        placeholder="Ingrese el total de bolsas recolectadas"
                        name="recollected_bags"
                        v-model="recollected_bags"
                        :error="recollected_bagsError"
                    />
                    <p v-if="errors.recollected_bags" class="mt-2 text-danger-500 block text-sm">{{ errors.recollected_bags[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Plaquetas requeridas *"
                        type="number" 
                        placeholder="Ingrese el numero total de plaquetas requeridas"
                        name="required_platelets"
                        v-model="required_platelets"
                        :error="required_plateletsError"
                    />
                    <p v-if="errors.required_platelets" class="mt-2 text-danger-500 block text-sm">{{ errors.required_platelets[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Plaquetas recolectadas *"
                        type="number"
                        placeholder="Ingrese el numero de plaquetas recolectadas"
                        name="recollected_platelets"
                        v-model="recollected_platelets"
                        :error="recollected_plateletsError"
                    />
                    <p v-if="errors.recollected_platelets" class="mt-2 text-danger-500 block text-sm">{{ errors.recollected_platelets[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Textinput
                        label="Descripcion"
                        type="text"
                        placeholder="Escriba una descripción para su campaña"
                        name="description"
                        v-model="description"
                        :error="descriptionError"
                    />
                    <p v-if="errors.description" class="mt-2 text-danger-500 block text-sm">{{ errors.description[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Beneficiario *"
                        type="text"
                        placeholder="Seleccione el beneficiario de su campaña"
                        name="beneficiary_id"
                        :options="beneficiaries"
                        v-model="beneficiary_id"
                        :error="beneficiary_idError"
                    />
                    <p v-if="errors.beneficiary_id" class="mt-2 text-danger-500 block text-sm">{{ errors.beneficiary_id[0] }}</p>
                </div>
                <div class="flex gap-0 flex-col justify-center align-middle">
                    <Select
                        label="Sede hospital *"
                        type="text"
                        placeholder="Seleccione un hospital para donar en su campaña"
                        name="hospital_id"
                        :options="hospitals"
                        v-model="hospital_id"
                        :error="hospital_idError"
                    />
                    <p v-if="errors.hospital_id" class="mt-2 text-danger-500 block text-sm">{{ errors.hospital_id[0] }}</p>
                </div>
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Crear" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/campaigns/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                Estas a punto de agregar una nueva entidad a la base de datos.<br>
                ¿Estás seguro que quieres continuar?
                <br><br>
                <div>
                    <div>
                        <span class="font-bold">Beneficiario:</span>
                        <span>&nbsp</span>
                        <span>{{ beneficiaries.find(b => b.value == beneficiary_id)?.label }}</span>
                    </div>
                    <div>
                        <span class="font-bold">ID del Hospital:</span>
                        <span>&nbsp</span>
                        <span>{{ hospitals.find(b => b.value == hospital_id)?.label }}</span>
                        
                    </div>F
                    <div>
                        <span class="font-bold">Bolsas requeridas:</span>
                        <span>&nbsp</span>
                        <span>{{ required_bags }}</span>
                    </div>
                    <div>
                        <span class="font-bold">Bolsas recolectadas:</span>
                        <span>&nbsp</span>
                        <span>{{ recollected_bags }}</span>
                    </div>
                    <div>
                        <span class="font-bold">Plaquetas requeridas:</span>
                        <span>&nbsp</span>
                        <span>{{ required_platelets }}</span>
                    </div>
                    <div>
                        <span class="font-bold">Plaquetas recolectadas:</span>
                        <span>&nbsp</span>
                        <span>{{ recollected_platelets }}</span>
                    </div>
                </div>
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createBeneficiary()" />
                    <Button btnClass="btn-dark" text="Retroceder" @click="displayConfirmMessage()" />
                </div>
            </Card>
        </div>
    </div>
</template>

<script>
    import Card from "@/components/Card";
    import Button from "@/components/Button";
    import Textarea from "@/components/Textarea";
    import Textinput from "@/components/Textinput";
    import { useField, useForm } from "vee-validate";
    import Select from "@/components/Select";
    import { ref, watch } from "vue";
    import axios from "@/plugins/axios";
    import * as yup from 'yup';
    import { useToast } from "vue-toastification";
    import router from '../../router';
    import { useCachedDataStoreBeneficiaries } from '@/stores/beneficiariesStore';
    import { useCachedDataStoreHospitals } from '@/stores/hospitalsStore';
    import { useCachedDataStoreCampaigns } from '@/stores/campaignsStore';
    import { useRouter } from 'vue-router';

    export default {
        components: {
            Textinput,
            Button,
            Textarea,
            Select,
            Textinput,
            Card
        },
        setup() {
            const schema = yup.object().shape({
                required_bags: yup.string()
                    .required("El número de bolsas necesitadas es requerido"),
                recollected_bags: yup.string()
                    .required("El número de bolsas recolectadas hasta ahora es requerido"),
                required_platelets: yup.string()
                    .required("El número de plaquetas necesitadas es requerido"),
                recollected_platelets: yup.string()
                    .required("El número de plaquetas recolectadas hasta ahora es requerido"),
                description: yup.string(),
                beneficiary_id: yup.string()
                    .required("Se necesita seleccionar al beneficiario de esta campaña"),
                hospital_id: yup.string()
                    .required("Se requiere seleccionar la sede hospital"),
            });

            let formValues = ref([]);
            const { handleSubmit } = useForm({
                validationSchema: schema,
            });
            const trySubmit = handleSubmit(async (values) => {
                formValues = values;
                displayConfirmMessage();
            }); 
            const onSubmit = handleSubmit((values) => {
                const newBeneficiaryForm = [
                    { name: 'required_bags', value: required_bags.value },
                    { name: 'recollected_bags', value: recollected_bags.value },
                    { name: 'required_platelets', value: required_platelets.value },
                    { name: 'recollected_platelets', value: recollected_platelets.value },
                    { name: 'description', value: description.value },
                    { name: 'beneficiary_id', value: beneficiary_id.value },
                    { name: 'hospital_id', value: hospital_id.value },
                ];
                trySubmit(newBeneficiaryForm);
            });

            
            let confirmMessageFlag = ref(false);
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            
            let errorMessage = ref("");
            let errors = ref([]);
            const toast = useToast();
            function userRedirect(){
                router.push('/campaigns', {shallow: false});
            }
            function createBeneficiary(){
                confirmMessageFlag.value = false;
                axios.put(`/api/campaigns/${campaignId}`, formValues)
                .then(res => {
                    /* console.log(res); */
                    useCachedDataStoreCampaigns().refreshData();
                    toast.success("¡Campaña editada correctamente!", { timeout: 1000 });
                    setTimeout(userRedirect, 1000);
                })
                .catch(error => {
                    toast.error("Ha ocurrido un error inesperado.", { timeout: 2000 });
                    if (error.response && error.response.data) {
                        const responseData = error.response.data;
                        errorMessage.value = responseData.message || 'An error occurred.';

                        if (responseData.errors) {
                            errors.value = responseData.errors;
                        }
                    } else {
                        errorMessage.value = 'An error occurred.';
                    }
                    console.log(errors)
                    console.log(errorMessage)
                });
            }

            const { value: required_bags, errorMessage: required_bagsError } = useField("required_bags");
            const { value: recollected_bags, errorMessage: recollected_bagsError } = useField("recollected_bags");
            const { value: required_platelets, errorMessage: required_plateletsError } = useField("required_platelets");
            const { value: recollected_platelets, errorMessage: recollected_plateletsError } = useField("recollected_platelets");
            const { value: description, errorMessage: descriptionError } = useField("description");
            const { value: beneficiary_id, errorMessage: beneficiary_idError } = useField("beneficiary_id");
            const { value: hospital_id, errorMessage: hospital_idError } = useField("hospital_id");

            const { hospitalsTable } = useCachedDataStoreHospitals();
            useCachedDataStoreHospitals().fetchData();
            let hospitals = ref([]);
            watch(hospitalsTable, () => {
                fillHospitalArray();
            });

            const { beneficiariesTable } = useCachedDataStoreBeneficiaries();
            useCachedDataStoreBeneficiaries().fetchData();
            let beneficiaries = ref([]);
            watch(beneficiariesTable, () => {
                fillBeneficiariesArray();
            });

            if(beneficiaries.value.length == 0 || hospitals.value.length == 0){
                if(beneficiariesTable != null && hospitalsTable != null){
                    fillBeneficiariesArray();
                    fillHospitalArray();
                }
            }
            function fillBeneficiariesArray(){
                beneficiaries.value = beneficiariesTable.map(beneficiaries => ({
                    value: beneficiaries.id,
                    label: beneficiaries.name
                }));
                /* console.log("Beneficiarios WATCH");
                console.log(beneficiaries.value); */
            }
            function fillHospitalArray(){
                hospitals.value = hospitalsTable.map(hospital => ({
                    value: hospital.id,
                    label: hospital.name
                }));
                /* console.log("Hospitales WATCH");
                console.log(hospitals.value); */
            }

            const { campaignsTable } = useCachedDataStoreCampaigns();
            useCachedDataStoreCampaigns().fetchData();
            const router = useRouter();
            const campaignId = router.currentRoute.value.params.id;
            function passCampaignValuesToSingleVariables() {
                required_bags.value = campaignData.value.required_bags;
                recollected_bags.value = campaignData.value.recollected_bags;
                required_platelets.value = campaignData.value.required_platelets;
                recollected_platelets.value = campaignData.value.recollected_platelets;
                description.value = campaignData.value.description;
                beneficiary_id.value = campaignData.value.beneficiary_id;
                hospital_id.value = campaignData.value.hospital_id;
            }
            let campaignData = ref(null); 
            watch(campaignsTable, () => {
                campaignData.value = campaignsTable.find(objeto => objeto.id == campaignId);
                if(campaignData.value != null){
                    console.log(campaignData.value);
                    passCampaignValuesToSingleVariables();
                }
            });
            if(campaignsTable){
                campaignData.value = campaignsTable.find(objeto => objeto.id == campaignId);
                if(campaignData.value != null){
                    console.log(campaignData.value);
                    passCampaignValuesToSingleVariables();
                }
            }

            return {
                beneficiaries,
                hospitals,
                required_bags,
                required_bagsError,
                recollected_bags,
                recollected_bagsError,
                required_platelets,
                required_plateletsError,
                recollected_platelets,
                recollected_plateletsError,
                description,
                descriptionError,
                beneficiary_id,
                beneficiary_idError,
                hospital_id,
                hospital_idError,
                createBeneficiary,
                displayConfirmMessage,
                confirmMessageFlag,
                onSubmit,
                errors,
                errorMessage
            };
        }
    }
</script>