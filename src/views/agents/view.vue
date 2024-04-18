<template>
    <div class="">
        <div class="space-y-5 profile-page">
            
            <div class="w-full">
                <div class="">
                    <Card title="Info">
                        <div class="flex gap-8">
                            <div class="flex-none">
                                <div class="md:h-[100px] md:w-[100px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4 ring-slate-100 relative">
                                    <img :src="profileImg" alt="" class="w-full h-full object-cover rounded-full" v-if="userData" />
                                    <img src="@/assets/images/avatar/av-1.svg" alt="" class="w-full h-full object-cover rounded-full" v-else />
                                        <router-link
                                            :to="`/participants/${id}/edit`"
                                            class="absolute right-2 h-4 w-4 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center justify-center md:top-[80px] top-[200px]"
                                            >
                                            <Icon icon="heroicons:pencil-square" />
                                        </router-link>
                                </div>
                            </div>
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

    import profileImg2 from "@/assets/images/all-img/UserImages/user2.png"
    import profileImg1 from "@/assets/images/all-img/UserImages/user.png"
    import profileImg3 from "@/assets/images/all-img/UserImages/user3.png"
    import profileImg4 from "@/assets/images/all-img/UserImages/user4.png"
    import profileImg5 from "@/assets/images/all-img/UserImages/user5.png"
    import profileImg6 from "@/assets/images/all-img/UserImages/user6.png"
    import profileImg7 from "@/assets/images/all-img/UserImages/user7.png"
    import profileImg8 from "@/assets/images/all-img/UserImages/user8.png"
    import profileImg9 from "@/assets/images/all-img/UserImages/user9.png"

    export default{
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

            const imageMapping = {
                'user.png': profileImg1,
                'user2.png': profileImg2,
                'user3.png': profileImg3,
                'user4.png': profileImg4,
                'user5.png': profileImg5,
                'user6.png': profileImg6,
                'user7.png': profileImg7,
                'user8.png': profileImg8,
                'user9.png': profileImg9
            };

            const profileImageKey = userData.value && userData.value.image_url ? userData.value.image_url : 'user.png'; // Default to user2.png if image_url is empty or null
            const profileImg = imageMapping[profileImageKey];

            return {
                profileImg,
                confirmMessageFlag,
                deleteElement,
                displayConfirmMessage,
                agentsTable,
                id,
                userData,
            };
        }
    }
</script>
