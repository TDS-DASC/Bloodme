<template>
    <div class="">
        <div class="p-4 bg-white rounded-md dark:bg-slate-800">
            <div class="flex items-center justify-between py-2">
                <h3>Crear Participante</h3><br>
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
                    label="Alias"
                    type="text"
                    placeholder="Ingrese el alias"
                    name="alias"
                    v-model="form.alias"
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
                <Select
                    label="Sexo"
                    type="text"
                    placeholder="Seleccione su sexo"
                    name="sex"
                    v-model="form.sex_options"
                />
                <Textinput
                    label="Número celular"
                    type="password"
                    placeholder="Ingrese su número celular"
                    name="phone"
                    v-model="form.phone_number"
                />
                <Textinput
                    label="CURP"
                    type="text"
                    placeholder="Ingrese un curp valido"
                    name="curp"
                    v-model="form.curp"
                />
                <Textinput
                    label="email"
                    type="email"
                    placeholder="Ingrese un correo electronico"
                    name="email"
                    v-model="form.email"
                />
                <Textinput
                    label="Contraseña*"
                    type="password"
                    placeholder="Ingrese su contraseña"
                    name="password"
                    v-model="form.password"
                    hasicon
                />

                <div class="lg:col-span-2 gap-2 flex">
                    <Button type="button" text="Crear" btnClass="btn-primary" @click="displayConfirmMessage()"></Button>
                    <router-link
                        :to="{ path:  '/participants/' }"
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
    import { useForm } from "vee-validate";
    import Select from "@/components/Select";
    import { ref } from "vue";

    export default {
        components: {
            Textinput,
            Button,
            Textarea,
            Select,
            Textinput,
            Card
        },
        props: {
            formInformation: Object,
        },
        setup() {

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

            const { handleSubmit } = useForm({
            });

            /* No de la template */
            const options = [
                { value: "1", label: "Participante" },
                { value: "2", label: "Agente" },
                { value: "3", label: "Administrador" },
            ];
            const sex_options = [
                { value: "1", label: "Hombre" },
                { value: "2", label: "Mujer" },
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

            let confirmMessage = ref(false)
            function displayConfirmMessage(){
                console.log(confirmMessage.value);
                confirmMessage.value = !confirmMessage.value;
            }
            function createUser(){
                confirmMessage.value = false;
                console.log("Usuario creado");
            }

            let selectedRole = ref(0);
            function handleRoleChange(newValue, selectedIndex){
                selectedRole = selectedIndex;
                console.log(selectedRole == 1);
            }
            

            return {
                options,
                blood_types,
                createUser,
                form,
                selectedRole,
                handleRoleChange,
                sex_options,
                displayConfirmMessage,
                confirmMessage
            };
        }
    }
</script>