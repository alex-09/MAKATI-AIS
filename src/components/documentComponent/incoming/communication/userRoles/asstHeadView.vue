<template>
    <div v-if="userDetails === 'Approver' && position === 'Assistant Department Head forFRS'" >
        <FRSView />
    </div>
    <div v-if="userDetails === 'Approver' && position === 'Assistant Department Head for AICS'" >
        <AICS />
    </div>
    <div v-if="userDetails === 'Approver' && position === 'Division Head' && division === 'Administrative Division'" >
        <AD />
    </div>
    <div v-if="userDetails === 'Approver' && position === 'Division Head' && division === 'Processing of Claims and Internal Control Division'" >
        <PCICD />
    </div>
    <div v-if="userDetails === 'Approver' && position === 'Division Head' && division === 'Payroll Processing and Remittance Division'" >
        <PPRD />
    </div>
    <div v-if="userDetails === 'Approver' && position === 'Division Head' && division === 'Financial Reporting Division'" >
        <FRD />
    </div>
    <div v-if="userDetails === 'Approver' && position === 'Division Head' && division === 'Bookkeeping Division'" >
        <BD />
    </div>
    <div v-if="userDetails === 'Approver' && position === 'Division Head' && division === 'Barangay Accounts Division'" >
        <BAD />
    </div>
</template>
<script>
import FRSView from './approverFRSView.vue';
import AICS from './approverView.vue';
import AD from './ADView.vue';
import PCICD from './PCICDView.vue';
import PPRD from './PPRDView.vue';
import FRD from './FRDView.vue';
import BD from './BDView.vue';
import BAD from './BADView.vue';

import axios from "axios";

export default {
    components: {
        FRSView,
        AICS,
        AD,
        PCICD,
        PPRD,
        FRD,
        BD,
        BAD,
    },
    data() {
        return {
            userDetails: "",
            position: "",
        }
    },
    async created() {
      const response = await axios.get('me');

      this.userDetails = response.data.user.userdesignation;
      this.position = response.data.user.position;
      this.division = response.data.user.division;
      console.log(this.position);
    }
}
</script>