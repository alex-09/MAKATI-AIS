<script setup>
import NavBar from '../../components/navigationComponent/navbarComponent.vue'
import HeaderMenu from '../../components/navigationComponent/headerComponent.vue';
import ActionButton from '../../components/obligationComponent/actionButton.vue';
import { ref } from 'vue'; 

    const records = ref([
    { id: 1, program: 'Name of Program', number: '123456', documenttype: 'Document type', referenceno: '0000-7836-1234', department: 'department', particular: 'particulars', amount: '999,999.99' , dateprocess: 'February 23, 2023' , status: 'With Findings'},
    { id: 2, program: 'Name of Program', number: '123456', documenttype: 'Document type', referenceno: '0000-7836-1234', department: 'department', particular: 'particulars', amount: '999,999.99' , dateprocess: 'February 23, 2023', status: 'With Findings'},
    { id: 3, program: 'Name of Program', number: '123456', documenttype: 'Document type', referenceno: '0000-7836-1234', department: 'department', particular: 'particulars', amount: '999,999.99', dateprocess: 'February 23, 2023', status: 'With Findings'},
      { id: 4, program: 'Name of Program', number: '123456', documenttype: 'Document type', referenceno: '0000-7836-1234', department: 'department', particular: 'particulars', amount: '999,999.99' ,dateprocess: 'February 23, 2023', status: 'With Findings'},
      { id: 5, program: 'Name of Program', number: '123456', documenttype: 'Document type', referenceno: '0000-7836-1234', department: 'department', particular: 'particulars' , amount: '999,999.99' , dateprocess: 'February 23, 2023', status: 'With Findings'},
  ]);
    
</script>



<template>
     <HeaderMenu />
    <NavBar />
    
  <div class="relative overflow-x-auto">
    <div class="bg-white shadow-md rounded my-4 flex justify-center">
      <table class="w-full table-fixed whitespace-normal">
        <thead>
          <tr class="bg-gray-300 text-gray-600 uppercase text-sm leading-normal">
            
            <td class="py-3 px-12 text-center"><input  class="" type="checkbox" id="checkbox" v-model="checked" /></td>
            <th class="py-3 px-7 text-left">Number</th>
            <th class="py-3 px-7 text-left">Document Type</th>
            <th class="py-3 px-7 text-left">Reference No.</th>
            <th class="py-3 px-7 text-left">Department</th>
            <th class="py-3 px-7 text-left">Particular</th>
            <th class="py-3 px-7 text-left">Amount</th>
            <th class="py-3 px-7 text-left">Date Process</th>
            <th class="py-3 px-7 text-left">Status</th>
            <th class="py-3 px-7 text-left">Action</th>
  
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm leading-normal">
          <tr  class="border-b border-gray-200 hover:bg-gray-100" v-for="record in records" :key="record.id">
        
          <td class="py-3 px-6 text-center">   <input  class="" type="checkbox" id="checkbox" v-model="checked" /></td>
          <td class="py-3 px-7 text-left">{{ record.number }}</td>
          <td class="py-3 px-7 text-left">{{ record.documenttype }}</td>
          <td class="py-3 px-7 text-left">{{ record. referenceno }}</td>
          <td class="py-3 px-7 text-left">{{ record.department }}</td>
          <td class="py-3 px-7 text-left">{{ record.particular }}</td>
          
        
    
          <td class="py-3 px-7 text-left">{{ record.amount }}</td>
          <td class="py-3 px-7 text-left">{{ record.dateprocess }}</td>
          <td class="py-3 px-7 text-left">{{ record.status }}</td>
          <td class="py-3 px-7 text-center"><ActionButton></ActionButton></td>
      </tr>
        </tbody>
      </table>
    </div>
    <div class="text-right fluid">
  </div>
  </div>
</template>