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
                                        <Icon icon="icon-park-outline:edit-name" />
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
                                        <Icon icon="icon-park-outline:edit-name" />
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
                                        <Icon icon="heroicons:map" />
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
                                        <Icon icon="heroicons:map" />
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
                </div>
            </div>
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

            return {
                agentsTable,
                id,
                userData,
            };
        }
    })
</script>
