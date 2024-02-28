<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Beneficiario</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            <form
                @submit.prevent="onSubmit"
                class="lg:grid-cols-2 grid gap-5 grid-cols-1"
            >
                <Textinput
                    label="Nombre *"
                    type="text"
                    placeholder="Ingrese el nombre"
                    name="name"
                    v-model="form.name"
                />
                <Textinput
                    label="Apellidos"
                    type="text"
                    placeholder="Ingrese sus apellidos"
                    name="lastname"
                    v-model="form.lastname"
                />
                <Textinput
                    label="Fecha de nacimiento"
                    type="date"
                    placeholder="Fecha de nacimiento"
                    name="date"
                    v-model="form.birth_date"
                />
                <Select
                    label="Tipo de sangre"
                    type="text"
                    placeholder="Seleccione su tipo de sangre"
                    name="bloodtype"
                    :options="blood_types"
                    v-model="form.blood_type"
                />
                <Textinput
                    label="CURP"
                    type="text"
                    placeholder="Ingrese un curp valido"
                    name="curp"
                    v-model="form.curp"
                />
                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="button" text="Crear" btnClass="btn-primary" @click="displayConfirmMessage()"></Button>
                    <router-link
                        :to="{ path:  '/beneficiaries/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessage">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                Estas a punto de agregar una nueva entidad a la base de datos.<br>
                ¿Estás seguro que quieres continuar?
                <div class="mt-9 flex justify-evenly">
                    <Button btnClass="btn-primary" text="Confirmar" @click="createUser()" />
                    <Button btnClass="btn-dark" text="Cancelar" @click="displayConfirmMessage()" />
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
    import { useCachedDataStoreBeneficiaries } from '@/stores/beneficiariesStore';
    import { useRouter } from 'vue-router';
    import { ref, watch } from 'vue';

    export default {
        components: {
            Textinput,
            Button,
            Textarea,
            Select,
            Card
        },
        props: {
            formInformation: Object,
        },
        setup() {
            

            const { handleSubmit } = useForm({
            });
            // No need to define rules for fields

            const onSubmit = handleSubmit(() => {
                // console.warn(values.email);
            });


            /* No de la template */
            const blood_types = [
                { value: 'A+', label: 'A+' },
                { value: 'A-', label: 'A-' },
                { value: 'B+', label: 'B+' },
                { value: 'B-', label: 'B-' },
                { value: 'AB+', label: 'AB+' },
                { value: 'AB-', label: 'AB-' },
                { value: 'O+', label: 'O+' },
                { value: 'O-', label: 'O-' }
            ];
            const rolTypes = [
                { value: "administrator", label: "administrator" },
                { value: "agent", label: "agent" },
                { value: "participant", label: "participant" },
            ];

            /* Not from the template */

            const router = useRouter();
            const { beneficiariesTable } = useCachedDataStoreBeneficiaries();
            const id = router.currentRoute.value.params.id;
            
            useCachedDataStoreBeneficiaries().fetchData();

            let userData = ref(null); 
            let form = ref({
                name: null,
                lastname: null,
                alias: null,
                birth_date: null,
                blood_type: null,
                phone_number: null,
                curp: null,
                email: null,
                password: null,
                role: null,
            })

            watch(beneficiariesTable, () => {
                userData.value = beneficiariesTable.find(objeto => objeto.id == id);
                assignFormValues();
            });

            if(beneficiariesTable){
                userData.value = beneficiariesTable.find(objeto => objeto.id == id);
                assignFormValues();
            }

            function assignFormValues(){
                if(userData.value){
                    form.value.name = userData.value.name;
                    form.value.lastname = userData.value.lastname;
                    form.value.alias = userData.value.alias;
                    form.value.birth_date = userData.value.birth_date;
                    form.value.blood_type = userData.value.blood_type;
                    form.value.phone_number = userData.value.phone_number;
                    form.value.curp = userData.value.curp;
                    form.value.email = userData.value.email;
                    form.value.role = userData.value.role;
                }
            }

            let confirmMessage = ref(false)
            function displayConfirmMessage(){
                console.log(confirmMessage.value);
                confirmMessage.value = !confirmMessage.value;
            }
            function editUser(){
                confirmMessage.value = false;
                console.log("Usuario editado");
            }

            return {
                blood_types,
                rolTypes,
                onSubmit,
                beneficiariesTable,
                userData,
                form,
                confirmMessage,
                displayConfirmMessage,
                editUser
            };
        }
    }
</script>