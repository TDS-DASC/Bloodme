<template>
    <div class="">
        <div class="space-y-5 profile-page">
            
            <div class="w-full">
                <div class="">
                    <Card title="Info">
                        <div class="flex gap-8">
                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="heroicons:envelope" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            EMAIL
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.email">{{ userData.email }}</p>
                                            <p v-else> No registrado </p>
                                        </a>
                                        <p v-else>...</p>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="heroicons:phone-arrow-up-right" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            CELULAR
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.phone_number">{{ userData.phone_number}}</p>
                                            <p v-else> No registrado </p>
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="cil:birthday-cake" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Fecha de nacimiento
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.birth_date">{{ userData.birth_date }}</p>
                                            <p v-else> No registrado </p>
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        <!-- Separacion -->
                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="wpf:name" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Nombre
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.name"> {{ userData.name }}</p>
                                            <p v-else> No registrado </p>
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="mdi:dot" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Apellidos
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.lastname">{{ userData.lastname }}</p>
                                            <p v-else> No registrado </p>
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="fluent-emoji-high-contrast:glasses" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Alias
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.alias">{{ userData.alias }}</p>
                                            <p v-else> No registrado </p>
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                            

                        <!-- Separacion -->


                        <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="streamline:blood-bag-donation" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Tipo de sangre 
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.blood_type">{{ userData.blood_type }}</p>
                                            <p v-else> No registrado </p>
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="healthicons:sexual-reproductive-health-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Sexo
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            <p v-if="userData.sex">{{ userData.sex }}</p>
                                            <p v-else> No registrado </p>
                                        </div>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        </div>
                    </Card>
                    <br>
                    <div class="gap-3 w-1/2 flex">
                        <router-link 
                            :to="`/agents`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/agents/${ id }/edit`" class="w-1/4">
                            <Button type="button" text="Crear" btnClass="btn-warning" class="w-full">Editar</Button>
                        </router-link>
                        <Button type="button" text="Crear" btnClass="btn-danger" class="w-1/4" @click="displayConfirmMessage()">Eliminar</Button>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3" v-if="confirmMessageFlag">
          <Card title="Se requiere confirmación" class="text-center" noborder>
            <span class="dark:text-white">
                    Estas a punto de eliminar una entidad de la base de datos.<br>
                    ¿Estás seguro que quieres continuar?
                </span>
              <div class="mt-9 flex justify-evenly">
                  <Button btnClass="btn-primary" text="Confirmar" @click="deleteElement()" />
                  <Button btnClass="btn-dark" text="Cancelar" @click="displayConfirmMessage()" />
              </div>
          </Card>
        </div>
    </div>
</template>

<script>
    import Button from "@/components/Button";
    import profile from "@/components/profile"
    import Card from "@/components/Card";
    import Icon from "@/components/Icon";
    import { useCachedDataStoreAgents } from '@/stores/agentsStore';
    import { useRouter } from 'vue-router';
    import { ref, watch } from 'vue';
    import { useToast } from "vue-toastification";
    import axios from "@/plugins/axios";

    export default({
        components:{
            profile,
            Card,
            Icon,
            Button
        },
        setup() {
            const router = useRouter();
            const { agentsTable } = useCachedDataStoreAgents();
            const id = router.currentRoute.value.params.id;
            
            useCachedDataStoreAgents().fetchData();

            let userData = ref(null); 

            watch(agentsTable, () => {
                console.log(agentsTable);
                userData.value = agentsTable.find(objeto => objeto.id == id);
            });

            if(agentsTable)
                userData.value = agentsTable.find(objeto => objeto.id == id);

            let confirmMessageFlag = ref(false);
            const toast = useToast();
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){
                router.push({ path: '/refresh', query: { urlHeader: 'agents' } });
            }
            function deleteElement(){
                confirmMessageFlag.value = false;
                axios.delete(`/api/agents/${ id }`)
                .then(response => {
                    useCachedDataStoreAgents().refreshData();
                    toast.success("¡Agente eliminado correctamente!", { timeout: 1000 });
                    setTimeout(userRedirect, 1000);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    toast.error("Ha ocurrido un error inesperado.", { timeout: 1000 });
                });
            }

            return {
                confirmMessageFlag,
                deleteElement,
                displayConfirmMessage,
                agentsTable,
                id,
                userData,
            };
        }
    })
</script>
