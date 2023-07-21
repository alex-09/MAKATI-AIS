<template>
    <transition name="modal">
        <div v-if="toShow" class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-30 flex justify-center">
            <div class="p-4 bg-white self-start mt-32 w-800 h-420">
                <div class="mx-4">
                    <h5 class="text-2xl font-semibold uppercase text-secondBtn">View Description</h5>
                </div>
                <div class="flex flex-col mt-4 mx-4">
                    <p class="text-other-black-100 my-1 font-bold">Account Code</p>
                    <span class="text-other-black-100 my-1">{{euser.currDesc.account_code}}</span>
                </div>

                <!-- EDIT DESCRIPTION -->
                <div v-if="isShowEdit">
                    <form @submit.prevent="enrollAssets(form)">
                        <div class="flex flex-col mx-4">
                            <p class="text-other-black-100 my-2 font-bold">Description</p>
                            <textarea rows="5" class="border my-2 p-2" v-model="euser.currDesc.description" />
                        </div>
                        <div>
                            <button class="text-other-black-100 mt-8 bg-dashboardBtn9 py-2 px-6 mx-4 w-125 uppercase float-right" @click="isShowEdit = !isShowEdit">Save</button>
                            <button type="button" class="text-white mt-8 bg-danger-color py-2 px-6 mx-4 w-125 uppercase float-right" @click="$emit('toFalse', closeModal())">Close</button>
                        </div>
                    </form>
                </div>
                <!-- VIEW DESCRIPTION -->
                <div v-else>
                    <div class="mx-4">
                        <p class="text-other-black-100 my-2 font-bold">Description</p>
                        <div v-if="euser.currDesc.description == null">
                            <span class="text-other-black-100 my-2 text-base text-justify">No Description</span>
                        </div>
                        <div v-else>
                            <span class="text-other-black-100 my-2 text-base text-justify">{{euser.currDesc.description}}</span>
                        </div>
                    </div>

                    <div>
                        <button class="text-other-black-100 mt-8 bg-dashboardBtn9 py-2 px-6 mx-4 w-125 uppercase float-right" @click="editDescBtn()">Edit</button>
                        <button type="button" class="text-white mt-8 bg-danger-color py-2 px-6 mx-4 w-125 uppercase float-right" @click="$emit('toFalse', closeModal())">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import { ref, defineComponent } from "vue";
// import updateDesc from "../../../request/assets.js"

export default defineComponent({
    name: 'sampleModal',
    props: {
        euser: {
            type: Object,
        },
        showViewDesc: {
            type: Boolean,
            'default' : false,
        },
        isShowEdit: {
            type: Boolean,
            'default' : false,
        }
    },

    data() {
        return {
            edit_desc: [],
            isShowEdit: false,
            form: {
                description: ''
            },
        };

    },
    setup(props){

        const toShow = ref([]);
        toShow.value = props.showViewDesc;

        const closeModal = () => {

            toShow.value = !toShow.value;

            return toShow.value;
        }

        const enrollAssets = () => {
            const { id, currDesc } = props.euser;

            axios.post(`http://makati-ais-api.com/api/coa/addAssetDescription/${id}`, {
            description: form.description
            }).then(response => {
                console.log(response);
                closeModal();
            }).catch(error => {
                console.log(error);
            });
        }

        const editDescBtn = () => {
            this.isShowEdit = true;
            this.form.description = props.euser.currDesc.description;
        }

        return {
        
            toShow,
            closeModal,
            enrollAssets,
            editDescBtn,
            form,
        }
    },

});
</script>

<style scoped>
    .modal-outer-enter-active, .modal-outer-leave-active {
        transition: opacity 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
    }

    .modal-outer-enter-from, .modal-outer-leave-to {
        opacity: 0;
    }

    .modal-inner-enter-active {
        transition: all 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02) 0.15s;
    }

    .modal-inner-leave-active {
        transition: all 0.03s cubic-bezier(0.52, 0.02, 0.19, 1.02)
    }

    .modal-inner-enter-from {
        opacity: 0;
        transform: scale(0.8);
    }

    .modal-inner-leave-to {
        transform: scale(0.8);
    }
</style>