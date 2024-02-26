<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Editar usuario</h3><br>
            </div>
            <div class="w-full border-slate-200 border-b-2 dark:border-slate-600"></div>
            <br>
            <form
                @submit.prevent="onSubmit"
                class="lg:grid-cols-2 grid gap-5 grid-cols-1"
                v-if="userData"
            >
                <Textinput
                    label="Nombre *"
                    type="text"
                    placeholder="Ingrese el nombre"
                    name="name"
                    v-model=form.name
                    :error="usernameError"
                />
                <Textinput
                    label="Apellidos"
                    type="text"
                    placeholder="Ingrese sus apellidos"
                    name="lastname"
                    v-model=form.lastname
                    :error="lastnameError"
                />
                <Textinput
                    label="Alias"
                    type="text"
                    placeholder="Ingrese el alias"
                    name="alias"
                    v-model=form.alias
                    :error="aliasError"
                />

                <Textinput
                    label="Fecha de nacimiento"
                    type="date"
                    placeholder="Fecha de nacimiento"
                    name="date"
                    v-model=form.birth_date
                    :error="alphabeticError"
                />

                <Select
                    label="Tipo de sangre"
                    type="text"
                    placeholder="Enter minimum 3 Characters"
                    name="bloodtype"
                    v-model=form.blood_type
                    :options=bloodTypes
                    :error="lengthError"
                />
                <Textinput
                    label="Número celular"
                    type="password"
                    placeholder="8+ characters, 1 capitat letter "
                    name="phone"
                    v-model="password"
                    :error="passwordError"
                />
                <Textinput
                    label="CURP"
                    type="text"
                    placeholder="Enter Valid CURP"
                    name="curp"
                    v-model="curp"
                    :error="curpError"
                />
                <Textinput
                    label="email"
                    type="email"
                    placeholder="Enter Valid URL"
                    name="email"
                    v-model="url"
                    :error="urlError"
                />
                <Textinput
                    label="password"
                    type="url"
                    placeholder="Enter Valid URL"
                    name="password"
                    v-model="password"
                    :error="passwordError"
                />
                <Select
                    label="blood"
                    placeholder="Select your blood type"
                    v-model="bloodType"
                    :options="bloodTypes"
                    :error="urlError"
                />
                <Select
                    label="roles"
                    placeholder="Select your blood type"
                    v-model="rolType"
                    :options="rolTypes"
                    :error="rolTypeError"
                />

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="subtmit" text="Modificar" btnClass="btn-dark"></Button>
                    <Button text="Cancelar" btnClass="btn-danger"></Button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import Textarea from "@/components/Textarea";
    import Textinput from "@/components/Textinput";
    import { useField, useForm } from "vee-validate";
    import Select from "@/components/Select";
    import * as yup from "yup";
    import { useCachedDataStore } from '@/stores/usersStore';
    import { useRouter } from 'vue-router';
    import { ref, watch } from 'vue';

    export default {
        components: {
            Textinput,
            Button,
            Textarea,
            Select,
        },
        props: {
            formInformation: Object,
        },
        setup() {
            // Define a validation schema
            const schema = yup.object({
                username: yup.string().required(),
                number: yup.number().required().positive(),
                
                betweenNumber: yup
                .number()
                .required("The Number between field is required")
                .positive()
                .min(1)
                .max(10),

                alphabetic: yup
                .string()
                .required()
                .matches(/^[a-zA-Z]+$/, "Must only consist of alphabetic characters"),

                lastname: yup
                .string()
                .required()
                .matches(/^[a-zA-Z]+$/, "Must only consist of alphabetic characters"),

                alias: yup
                .string()
                .required()
                .matches(/^[a-zA-Z]+$/, "Must only consist of alphabetic characters"),

                length: yup
                .string()
                .required("The Min Character field is required")
                .min(3),

                curp: yup
                .string()
                .required("The Min Character field is required")
                .min(16),

                email: yup
                .string()
                .required("The Min Character field is required")
                .email(),

                bloodType: yup
                .string()
                .required("Please select a bloodType")
                .email(),

                rolType: yup
                .string()
                .required("Por favor seleccione un rol de usuario"),

                password: yup.string().required().min(8),
                url: yup.string().required("The URL field is required").url(),
                message: yup.string().required("The Message field is required"),
            });

            const { handleSubmit } = useForm({
                validationSchema: schema,
            });
            // No need to define rules for fields

            const { value: username, errorMessage: usernameError } = useField("username");
            const { value: number, errorMessage: numberError } = useField("number");
            const { value: betweenNumber, errorMessage: betweenNumberError } = useField("betweenNumber");
            const { value: alphabetic, errorMessage: alphabeticError } = useField("alphabetic");
            const { value: alias, errorMessage: aliasError } = useField("alias");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: length, errorMessage: lengthError } = useField("length");
            const { value: password, errorMessage: passwordError } = useField("password");
            const { value: url, errorMessage: urlError } = useField("url");
            const { value: message, errorMessage: messageError } = useField("message");
            const { value: curp, errorMessage: curpError } = useField("curp");
            const { value: email, errorMessage: emailError } = useField("email");
            const { value: bloodType, errorMessage: bloodTypeError } = useField("email");
            const { value: rolType, errorMessage: rolTypeError } = useField("rolType");

            const onSubmit = handleSubmit(() => {
                // console.warn(values.email);
            });


            /* No de la template */
            const options = [
                { value: "1", label: "Usuario" },
                { value: "2", label: "Administrador" },
            ];
            const bloodTypes = [
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
                { value: 'Participants', label: 'Participante' },
                { value: 'Administrator', label: 'Administrator' },
                { value: 'Agents', label: 'Agentes' },
            ];

            /* Not from the template */

            const router = useRouter();
            const { participantsTable } = useCachedDataStore();
            const id = router.currentRoute.value.params.id;
            
            useCachedDataStore().fetchData();

            let userData = ref(null); 
            let form = ref({
                name: null,
                lastname: null,
                alias: null,
                birth_date: null,
                blood_type: null
            })

            watch(participantsTable, () => {
                userData.value = participantsTable.find(objeto => objeto.id == id);
                form.value.name = userData.value.name;
                form.value.lastname = userData.value.lastname;
                form.value.alias = userData.value.alias;
                form.value.birth_date = userData.value.birth_date;
                form.value.blood_type = userData.value.blood_type;
                form.value.phone = userData.value.phone;
            });

            if(participantsTable)
                userData.value = participantsTable.find(objeto => objeto.id == id);

            return {
                message,
                messageError,
                url,
                urlError,
                password,
                passwordError,
                length,
                lengthError,
                number,
                alphabetic,
                alphabeticError,
                betweenNumber,
                betweenNumberError,
                lastname,
                lastnameError,
                numberError,
                username,
                usernameError,
                email,
                emailError,
                alias,
                aliasError,
                curp,
                curpError,
                bloodType,
                bloodTypeError,
                rolType,
                rolTypeError,
                options,
                bloodTypes,
                rolTypes,
                onSubmit,
                participantsTable,
                userData,
                form
            };
        }
    }
</script>