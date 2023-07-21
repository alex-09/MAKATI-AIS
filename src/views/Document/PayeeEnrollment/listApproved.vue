<template>
    <HeaderMenu />
    <div v-if="userDetails === 'City Accountant'">
        <CAContent />
    </div>
    <div v-if="userDetails === 'Approver'">
        <ApproverContent />
    </div>
</template>

<script>
    import axios from 'axios';
    import CAContent from  '../../../components/documentComponent/PayeeEnrollment/userRoles/CAlistApproved.vue'
    import ApproverContent from  '../../../components/documentComponent/PayeeEnrollment/userRoles/ApprListApproved.vue'
    import HeaderMenu from "../../../components/navigationComponent/documentNav/headerComponent.vue";

    export default {
        components: {
            CAContent,
            ApproverContent,
            HeaderMenu,
        },
        data() {
            return {
                userDetails: '',
            }
        },
        async created() {
            const response = await axios.get('me');

            this.userDetails = response.data.user.userdesignation
        }
    }
</script>