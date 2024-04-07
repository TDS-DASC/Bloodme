<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Editar Participante</h3><br>
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
                    v-model="name"
                    :error="nameError"
                />
                <Textinput
                    label="Apellidos"
                    type="text"
                    placeholder="Ingrese sus apellidos"
                    name="lastname"
                    v-model="lastname"
                    :error="lastnameError"
                />
                <Textinput
                    label="Alias"
                    type="text"
                    placeholder="Ingrese el alias"
                    name="alias"
                    v-model="alias"
                    :error="aliasError"
                />

                <Textinput
                    label="Fecha de nacimiento"
                    type="date"
                    placeholder="Fecha de nacimiento"
                    name="date"
                    v-model="birth_date"
                    :error="birth_dateError"
                />

                <Select
                    label="Tipo de sangre"
                    type="text"
                    placeholder="Seleccione su tipo de sangre"
                    name="bloodtype"
                    :options="blood_types"
                    v-model="blood_type"
                    :error="blood_typeError"
                />
                <Select
                    label="Sexo"
                    type="text"
                    placeholder="Seleccione su sexo"
                    name="sex"
                    v-model="sex"
                    :options="sex_options"
                    :error="sexError"
                />
                <Textinput
                    label="Número celular"
                    type="number"
                    placeholder="Ingrese su número celular"
                    name="phone"
                    v-model="phone_number"
                    :error="phone_numberError"
                />
                <Textinput
                    label="CURP"
                    type="text"
                    placeholder="Ingrese un curp valido"
                    name="curp"
                    v-model="curp"
                    :error="curpError"
                />
                <Textinput
                    label="email"
                    type="email"
                    placeholder="Ingrese un correo electronico"
                    name="email"
                    v-model="email"
                    :error="emailError"
                />

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Editar" btnClass="btn-primary"></Button>
                    <router-link
                        :to="{ path:  '/participants/' }"
                    ><Button btnClass="btn-dark" text="Cancelar" /></router-link>
                </div>
            </form>
        </div>
        <div class="absolute w-1/4 shadow-xl top-40 right-1/3" v-if="confirmMessageFlag">
            <Card title="Se requiere confirmación" class="text-center" noborder>
                <p class="dark:text-white">
                    Estas a punto de editar una entidad de la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </p>
                <br>
                <div>
                    <div>
                        <p class="font-bold dark:text-white">Nombre:</p>
                        <p class="dark:text-gray-300">
                            {{ name }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Apellidos:</p>
                        <p class="dark:text-gray-300">
                            {{ lastname }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Correo electronico:</p>
                        <p class="dark:text-gray-300">
                            {{ email }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Alias:</p>
                        <p class="dark:text-gray-300">
                            {{ alias }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Fecha de nacimiento:</p>
                        <p class="dark:text-gray-300">
                            {{ birth_date }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Sexo:</p>
                        <p class="dark:text-gray-300">
                        {{ sex }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Número telefonico:</p>
                        <p class="dark:text-gray-300">
                        {{ phone_number }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">CURP:</p>
                        <p class="dark:text-gray-300">
                            {{ curp }}
                        </p>
                    </div>
                    <div>
                        <p class="font-bold dark:text-white">Tipo de sangre:</p>
                        <p class="dark:text-gray-300">
                            {{ blood_type }}
                        </p>
                    </div>
                </div>
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
    import { ref, watch } from "vue";
    import * as yup from 'yup';
    import axios from "@/plugins/axios";
    import { useCachedDataStoreParticipants } from '../../stores/participantsStore';
    import { useToast } from "vue-toastification";
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
                name: yup.string().required("El nombre es requerido")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                lastname: yup.string().required("Los apellidos son requeridos")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]*$/, "El nombre no puede contener números"),
                email: yup.string().required("El correo electrónico es requerido").email("Correo electrónico inválido"),
                alias: yup.string().nullable()
                    .required("El alias es requerido")
                    .matches(/^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s.]*$/, "El nombre no puede contener números"),
                birth_date: yup.date().nullable().required("Es necesario brindar una fecha de nacimiento"),
                /* image_url: yup.date().nullable().required(), */
                sex: yup.string().nullable().required("Es necesario seleccionar el sexo"),
                phone_number: yup.string().nullable()
                    .required("El nummero de celular es requerido")
                    .max(10, "El Número de telefono no puede pasar de 10 digitos")
                    .min(10, "El Número de telefono no puede ser menor a 10 digitos"),
                curp: yup.string()
                    .required("El curp es requerido")
                    .max(18, "El curp no puede exceder los   18 caracteres")
                    .min(18, "El curp debe de tener al menos 18 caracteres"),
                blood_type: yup.string().nullable().required("Es necesario seleccionar el tipo de sangre"),
            });

            let errorMessage = ref("");
            let errors = ref([]);
            let formValues = ref([]);
            let confirmMessageFlag = ref(false);
            const toast = useToast();
            const { handleSubmit } = useForm({
                validationSchema: schema,
            });
            const trySubmit = handleSubmit(async (values) => {
                formValues = values;
                displayConfirmMessage();
            });
            const onSubmit = handleSubmit((values) => {
                const newUserForm = [
                    { name: 'name', value: name.value },
                    { name: 'lastName', value: lastname.value },
                    { name: 'alias', value: alias.value },
                    { name: 'birth_date', value: birth_date.value },
                    { name: 'blood_type', value: blood_type.value },
                    { name: 'phone_number', value: phone_number.value },
                    { name: 'curp', value: curp.value },
                    { name: 'email', value: email.value },
                    { name: 'role', value: role.value },
                    { name: 'sex', value: sex.value },
                ];
                trySubmit(newUserForm);
            });

            const { value: name, errorMessage: nameError } = useField("name");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: alias, errorMessage: aliasError } = useField("alias");
            const { value: birth_date, errorMessage: birth_dateError } = useField("birth_date");
            const { value: blood_type, errorMessage: blood_typeError } = useField("blood_type");
            const { value: phone_number, errorMessage: phone_numberError } = useField("phone_number");
            const { value: curp, errorMessage: curpError } = useField("curp");
            const { value: email, errorMessage: emailError } = useField("email");
            const { value: role, errorMessage: roleError } = useField("role");
            const { value: sex, errorMessage: sexError } = useField("sex");

            const sex_options = [
                { value: "H", label: "Hombre" },
                { value: "M", label: "Mujer" },
            ];
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

            function displayConfirmMessage(){
                console.log(confirmMessageFlag.value);
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            const router = useRouter();
            function userRedirect(){
                router.push('/participants', {shallow: false});
            }
            function createUser(){
                confirmMessageFlag.value = false;
                axios.put(`/api/participants/${ participantId }`, formValues)
                    .then(res => {
                        useCachedDataStoreParticipants().refreshData();
                        toast.success("¡Participante editado correctamente!", { timeout: 1000 });
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
                        console.log(error);
                    });
            }

            const { participantsTable } = useCachedDataStoreParticipants();
            const participantId = router.currentRoute.value.params.id;
            useCachedDataStoreParticipants().fetchData();

            function passParticipantValuesToSingleVariables() {
                name.value = participantData.value.name;
                lastname.value = participantData.value.lastname;
                alias.value = participantData.value.alias;
                birth_date.value = participantData.value.birth_date;
                blood_type.value = participantData.value.blood_type;
                phone_number.value = participantData.value.phone_number;
                curp.value = participantData.value.curp;
                email.value = participantData.value.email;
                role.value = participantData.value.role;
                sex.value = participantData.value.sex;
            }

            let participantData = ref(null); 
            watch(participantsTable, () => {
                participantData.value = participantsTable.find(objeto => objeto.id == participantId);
                if(participantData.value != null){
                    passParticipantValuesToSingleVariables();
                }
            });
            if(participantsTable){
                participantData.value = participantsTable.find(objeto => objeto.id == participantId);
                if(participantData.value != null){
                    passParticipantValuesToSingleVariables();
                }
            }

            return {
                blood_types,
                createUser,
                sex_options,
                displayConfirmMessage,
                confirmMessageFlag,
                name,
                nameError,
                lastname,
                lastnameError,
                alias,
                aliasError,
                birth_date,
                birth_dateError,
                blood_type,
                blood_typeError,
                phone_number,
                phone_numberError,
                curp,
                curpError,
                email,
                emailError,
                role,
                roleError,
                sex,
                sexError,
                onSubmit
            };
        }
    }
</script>