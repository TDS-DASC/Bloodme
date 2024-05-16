<template>
    <div class="">
        <div class="space-y-5 profile-page">
            <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0 space-y-6 justify-between items-end relative z-[1]">
                <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>    
                    <div class="profile-box flex-none md:text-start text-center w-full">
                        <div class="items-end flex justify-between w-full"  v-if="userRole == 'agent'">
                            <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4 ring-slate-100 relative">
                                        <img :src=profileImg alt="" class="w-full h-full object-cover rounded-full" v-if="userData" />
                                        <img src="@/assets/images/avatar/av-1.svg" alt="" class="w-full h-full object-cover rounded-full" v-else />
                                            <router-link
                                                :to="`/agents/${userId}/edit`"
                                                class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center justify-center md:top-[140px] top-[100px]"
                                                ><Icon icon="heroicons:pencil-square" />
                                            </router-link>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-if="userData">
                                        {{ userData.name }} {{ userData.lastname }}
                                    </div>
                                    <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-else>
                                        Cargando...
                                    </div>
                                    <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                                        Nombre completo
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-around">
                                <div class="gap-3 flex" v-if="userRole == 'agent'">
                                    <router-link 
                                        :to="`/home`">
                                        <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full h-10 text-center flex items-center">Regresar</Button>
                                    </router-link>
                                    <router-link 
                                        :to="`/agents/${ userId }/edit`" class="w-1/4">
                                        <Button type="button" text="Crear" btnClass="btn-warning" class="w-full h-10 text-center flex items-center">Editar</Button>
                                    </router-link>
                                    <Button type="button" text="Crear" btnClass="btn-danger" class="w-full h-10 text-center flex items-center" @click="displayConfirmMessage()">Eliminar</Button>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse h-[140px]"  v-else>
                            <div class="flex-none">
                            </div>
                            <div class="flex justify-between w-full">
                                <div>
                                    <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-if="userData">
                                        {{ userData.name }} {{ userData.lastname }}
                                    </div>
                                    <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]" v-else>
                                        Cargando...
                                    </div>
                                    <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                                        Nombre completo
                                    </div>
                                </div>
                                <div class="gap-3 flex" v-if="userRole == 'admin'">
                                    <router-link 
                                        :to="`/home`">
                                        <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full h-8 text-center flex items-center">Regresar</Button>
                                    </router-link>
                                    <router-link 
                                        :to="`/administrators/${ userId }/edit`" class="w-1/4">
                                        <Button type="button" text="Crear" btnClass="btn-warning" class="w-full h-8 text-center flex items-center">Editar</Button>
                                    </router-link>
                                    <Button type="button" text="Crear" btnClass="btn-danger" class="w-full h-8 text-center flex items-center" @click="displayConfirmMessage()">Eliminar</Button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="w-full">
                <div class="">
                    <Card title="Info">
                        <div class="flex gap-8">
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
                                            {{ userData.name }}
                                        </a>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'agent'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="heroicons:phone-arrow-up-right" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            CELULAR
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                        {{ userData.phone_number}}
                                        </a>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'agent'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="cil:birthday-cake" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Fecha de nacimiento
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.birth_date }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="mdi:dot" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                        Apellidos
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.lastname }}
                                        </a>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'agent'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="streamline:blood-bag-donation" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Tipo de sangre 
                                        </div>
                                        <a class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.blood_type }}
                                        </a>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'agent'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols:comedy-mask-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Alias
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.alias }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
                                            {{ userData.email }}
                                        </a>
                                        <p v-else>...</p>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'agent'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="healthicons:sexual-reproductive-health" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Sexo
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.sex }}
                                        </div>
                                    </div>
                                </li>
                                <li class="flex space-x-3 rtl:space-x-reverse" v-if="userRole == 'agent'">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="material-symbols-light:id-card-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            curp
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="userData">
                                            {{ userData.curp }}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </Card>
                    <br>
                    <div class="gap-3 w-1/2 flex items-center h-2" v-if="userRole == 'agent'">
                        <router-link 
                            :to="`/home`" class="w-1/4">
                            <Button type="button" text="" btnClass="btn-secondary" class="w-full"></Button>
                        </router-link>
                        <router-link 
                            :to="`/agents/${ userId }/edit`" class="w-1/4">
                            <Button type="button" text="" btnClass="btn-warning" class="w-full"></Button>
                        </router-link>
                        <a class="w-1/4">
                            <Button type="button" text="" btnClass="btn-danger" class="w-full" @click="displayConfirmMessage()"></Button>
                        </a>
                    </div>
                    <div class="gap-3 w-1/2 flex" v-if="userRole == 'admin'">
                        <router-link 
                            :to="`/home`" class="w-1/4">
                            <Button type="button" text="" btnClass="btn-secondary" class="w-full"></Button>
                        </router-link>
                        <router-link 
                            :to="`/administrators/${ userId }/edit`" class="w-1/4">
                            <Button type="button" text="" btnClass="btn-warning" class="w-full"></Button>
                        </router-link>
                        <a class="w-1/4">
                            <Button type="button" text="" btnClass="btn-danger" class="w-full" @click="displayConfirmMessage()"></Button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute w-1/4 shadow-xl top-1/3 right-1/3 z-10" v-if="confirmMessageFlag">
          <Card title="Se requiere confirmación" class="text-center" noborder>
              Estas a punto de eliminar tu cuenta de la base de datos, signfica que no podrás volver a acceder al sistema.<br><br>
              ¿Estás seguro que quieres continuar?
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
    import { ref, watch } from 'vue';
    import { useToast } from "vue-toastification";
    import axios from "@/plugins/axios";
    import { useCachedDataStoreAdministrators } from '@/stores/administratorsStore';
    import { useCachedDataStoreParticipants } from '@/stores/participantsStore';

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
            let confirmMessageFlag = ref(false);
            const toast = useToast();
            function displayConfirmMessage(){
                confirmMessageFlag.value = !confirmMessageFlag.value;
            }
            function userRedirect(){
                localStorage.removeItem('user');
                window.location.href = '/login';
            }
            function deleteElement(){
                confirmMessageFlag.value = false;
                if(userRole == 'admin'){
                    axios.delete(`/api/administrators/${ userId }`)
                    .then(response => {
                        useCachedDataStoreAdministrators().refreshData();
                        toast.success("¡Has eliminado tu cuenta con éxito!", { timeout: 1000 });
                        setTimeout(userRedirect, 1000);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        toast.error("Ha ocurrido un error inesperado.", { timeout: 1000 });
                    });
                }else{
                    axios.delete(`/api/participants/${ userId }`)
                    .then(response => {
                        useCachedDataStoreParticipants().refreshData();
                        toast.success("Has eliminado tu cuenta con éxito!", { timeout: 1000 });
                        setTimeout(userRedirect, 1000);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        toast.error("Ha ocurrido un error inesperado.", { timeout: 1000 });
                    });
                }
            }

            const userData = JSON.parse(localStorage.getItem('user'));
            console.log(userData)
            const userRole = JSON.parse(localStorage.getItem('user')).role;
            const userId = JSON.parse(localStorage.getItem('user')).id;

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
                userId,
                userRole,
                confirmMessageFlag,
                deleteElement,
                displayConfirmMessage,
                userData
            };
        }
    }
</script>
