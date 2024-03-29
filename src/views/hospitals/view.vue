<template>
    <div class="">
        <div class="space-y-5 profile-page">
            <div class="w-full">
                <div class="">
                    <Card title="Información del Hospital">
                        <div class="flex gap-8">
                            <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="solar:hospital-broken" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Nombre de hospital
                                        </div>
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="hospitalData">
                                            {{ hospitalData.name }}
                                        </a>
                                        <p v-else>...</p>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="ph:dot-outline-fill" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Latitude
                                        </div>
                                        <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50" v-if="hospitalData">
                                        {{ hospitalData.latitude}}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                            </ul>
                        <!-- Separacion -->
                        <ul class="list space-y-8 w-full">
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="mdi:address-marker-outline" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Dirección 
                                        </div>
                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50" v-if="hospitalData">
                                            {{ hospitalData.address }}
                                        </a>
                                    </div>
                                </li>
                            <!-- end single list -->
                                <li class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                        <Icon icon="ph:dot-outline-fill" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                            Longitude
                                        </div>
                                        <div class="text-base text-slate-600 dark:text-slate-50" v-if="hospitalData">
                                            {{ hospitalData.longitude }}
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
                            :to="`/hospitals`" class="w-1/4">
                            <Button type="button" text="Regresar" btnClass="btn-secondary" class="w-full">Regresar</Button>
                        </router-link>
                        <router-link 
                            :to="`/hospitals/${ id }/edit`" class="w-1/4">
                            <Button type="button" text="Crear" btnClass="btn-warning" class="w-full">Editar</Button>
                        </router-link>
                    </div>
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
    import { useCachedDataStoreHospitals } from '@/stores/hospitalsStore';
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
            const { hospitalsTable } = useCachedDataStoreHospitals();
            const id = router.currentRoute.value.params.id;
            
            useCachedDataStoreHospitals().fetchData();

            let hospitalData = ref(null); 

            watch(hospitalsTable, () => {
                console.log(hospitalsTable);
                hospitalData.value = hospitalsTable.find(objeto => objeto.id == id);
            });

            if(hospitalsTable)
                hospitalData.value = hospitalsTable.find(objeto => objeto.id == id);

            return {
                hospitalsTable,
                id,
                hospitalData,
            };
        }
    })
</script>
