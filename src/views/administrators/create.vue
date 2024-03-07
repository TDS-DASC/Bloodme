<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Administrador</h3><br>
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
                    required
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

                <Select
                    label="Sexo"
                    type="text"
                    placeholder="Seleccione su sexo"
                    name="sex"
                    v-model="sex"
                    :error="sexError"
                    :options="sex_options"
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
                    label="email"
                    type="email"
                    placeholder="Ingrese un correo electrónico"
                    name="email"
                    v-model="email"
                    :error="emailError"
                />

                <Textinput
                    label="Contraseña*"
                    type="password"
                    placeholder="Ingrese su contraseña"
                    name="password"
                    v-model="password"
                    :error="passwordError"
                    hasicon
                />

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="submit" text="Crear" btnClass="btn-primary"></Button>
                    <router-link :to="{ path:  '/administrators/' }">
                        <Button btnClass="btn-dark" text="Cancelar" />
                    </router-link>
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
    import Textinput from "@/components/Textinput";
    import Select from "@/components/Select";
    import { ref, watch } from "vue";
    import { useField, useForm } from "vee-validate";
    import * as yup from "yup";
    import axios from "@/plugins/axios";

    export default {
        components: {
            Textinput,
            Button,
            Select,
            Card
        },
        setup() {
            const schema = yup.object({
                name: yup.string().required("El nombre es requerido"),
                lastname: yup.string().required("Los apellidos son requeridos"),
                alias: yup.string().required("El alias es requerido"),
                phone_number: yup.string().required("El número de teléfono es requerido"),
                email: yup.string().required("El correo electrónico es requerido").email(),
                password: yup.string().required("La contraseña es requerida").min(3),
                sex: yup.string().required("Su tipo sexo es requerido"),
            });

            const { handleSubmit } = useForm({
                validationSchema: schema,
            });
            
            const { value: name, errorMessage: nameError } = useField("name");
            const { value: lastname, errorMessage: lastnameError } = useField("lastname");
            const { value: alias, errorMessage: aliasError } = useField("alias");
            const { value: phone_number, errorMessage: phone_numberError } = useField("phone_number");
            const { value: email, errorMessage: emailError } = useField("email");
            const { value: password, errorMessage: passwordError } = useField("password");
            const { value: role, errorMessage: roleError } = useField("role");
            const { value: sex, errorMessage: sexError } = useField("sex");

            const trySubmit = handleSubmit(async (values) => {
                console.log("sup");
                axios.post(`/administrators/`, values)
                .then(res => {
                    console.log(res);
                })
                .catch(error => {
                    console.error('Error in login request:', error);
                });
            }); 
            const onSubmit = handleSubmit((values) => {
                console.log("sup");
                const newUserForm = [
                    { name: 'name', value: name.value },
                    { name: 'lastName', value: lastname.value },
                    { name: 'alias', value: alias.value },
                    { name: 'phone_number', value: phone_number.value },
                    { name: 'sex', value: sex.value },
                    { name: 'email', value: email.value },
                    { name: 'password', value: password.value },
                ];
                trySubmit(newUserForm);
            });

            const sex_options = [
                { value: "H", label: "Hombre" },
                { value: "M", label: "Mujer" },
            ];

            let confirmMessage = ref(false)
            function displayConfirmMessage(){
                console.log(confirmMessage.value);
                confirmMessage.value = !confirmMessage.value;
            }
            function createUser(){
                confirmMessage.value = false;
                onSubmit();
            }

            let selectedRole = ref(0);
            function handleRoleChange(newValue, selectedIndex){
                selectedRole = selectedIndex;
                console.log(selectedRole == 1);
            }

            return {
                createUser,
                selectedRole,
                handleRoleChange,
                sex_options,
                displayConfirmMessage,
                confirmMessage,
                onSubmit,
                name,
                nameError,
                lastname,
                lastnameError,
                alias,
                aliasError,
                phone_number,
                phone_numberError,
                email,
                emailError,
                password,
                passwordError,
                role,
                roleError,
                sex,
                sexError
            };
        }
    }
</script>