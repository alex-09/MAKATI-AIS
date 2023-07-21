<script setup>
import NavBar from '../../components/navigationComponent/navbarComponent.vue'
    import HeaderMenu from '../../components/navigationComponent/headerComponent.vue';
import { ref } from 'vue'; 


    const records = ref([
    { id: 1, program: 'Name of Program', number: '123456', documenttype: 'CAFOA', processingslipno: '0000-7836-1234', department: 'department', particular: 'particular', amount: '999,999' , transaction: 'For Procument' },
    { id: 2, program: 'Name of Program', number: '123456', documenttype: 'CAFOA', processingslipno: '0000-7836-1234', department: 'department', particular: 'particular', amount: '999,999' , transaction: 'For Procument'},
    { id: 3, program: 'Name of Program', number: '123456', documenttype: 'CAFOA', processingslipno: '0000-7836-1234', department: 'department', particular: 'particular', amount: '999,999', transaction: 'For Procument'},
      { id: 4, program: 'Name of Program', number: '123456', documenttype: 'CAFOA', processingslipno: '0000-7836-1234', department: 'department', particular: 'particular', amount: '999,999' , transaction: 'For Procument'},
      { id: 5, program: 'Name of Program', number: '123456', documenttype: 'CAFOA', processingslipno: '0000-7836-1234', department: 'department', particular: 'particular' , amount: '999,999' , transaction: 'For Procument' },
  ]);
    
</script>
   

<template>
     <HeaderMenu />
    <NavBar />
  <div class="relative overflow-x-auto">     <!-- galawin mo to -->
    <div class="bg-white shadow-md rounded my-4 flex justify-center">
      <table class="w-full table-fixed whitespace-normal"> <!-- galawin mo to -->
        <thead>
          <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
            <td class="py-3 px-9 text-center">   <input  class="" type="checkbox" id="checkbox" v-model="checked" /></td>

<!-- galawin mo tong mga py px hindi sila same ng value bagubaguhin mo na lnag hanggang makuha mo yung tamang size --> 
            <th class="py-3 px-11 text-left">Number</th>
            <th class="py-3 px-11 text-left">Document Type</th>
            <th class="py-3 px-11 text-left">Processing Slip No.</th>
            <th class="py-3 px-11 text-left">Department</th>
            <th class="py-3 px-11 text-left">Particulars</th>
            <th class="py-3 px-11 text-left">Amount</th>
            <th class="py-3 px-11 text-left">Transaction Type</th>
         
         
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm leading-normal whitespace-normal">
          <tr  class="border-b border-gray-200 hover:bg-gray-100" v-for="record in records" :key="record.id">
        
          <td class="py-3 px-6 text-center">   <input  class="" type="checkbox" id="checkbox" v-model="checked" /></td>

          <td class="py-3 px-11 text-left">{{ record.number }}</td>
          <td class="py-3 px-11 text-left">{{ record.documenttype }}</td>
          <td class="py-3 px-11 text-left">{{ record.processingslipno }}</td>
          <td class="py-3 px-11 text-left">{{ record.department }}</td>
          <td class="py-3 px-11 text-left">{{ record.particular }}</td>
          <td class="py-3 px-11 text-left">{{ record.amount }}</td>
          <td class="py-3 px-11 text-left">{{ record.transaction }}</td>
        
        
          </tr>
        </tbody>
      </table>
    </div>
    <div class="text-right fluid">
    <v-btn class="bg-red-400 hover:bg-blue-700 text-white  font-bold py-2 px-4 rounded float-right mr-9" >
      CLOSE
    </v-btn>

    <v-btn 
      class="bg-blue-500 hover:bg-blue-700 text-uppercase text-white font-bold py-2 px-6 rounded float-right mr-3">
      PROCESS
    </v-btn>
  </div>
  </div>
</template>
