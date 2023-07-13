<script setup>
import NavBar from '../../components/navigationComponent/navbarComponent.vue'
    import HeaderMenu from '../../components/navigationComponent/headerComponent.vue';
import { ref } from 'vue'; 

    const records = ref([
    { id: 1, program: 'Name of Program', project: 'Name of Project', activity: 'Accounting', aip: '100-000-2-101-001-000-000', amount: '999,999', status: 'Approved' },
    { id: 2, program: 'Name of Program', project: 'Name of Project', activity: 'Accounting', aip: '100-000-2-101-001-000-000', amount: '999,999', status: 'Approved' },
    { id: 3, program: 'Name of Program', project: 'Name of Project', activity: 'Accounting', aip: '100-000-2-101-001-000-000', amount: '999,999', status: 'Disapproved' },
      { id: 4, program: 'Name of Program', project: 'Name of Project', activity: 'Accounting', aip: '100-000-2-101-001-000-000', amount: '999,999', status: 'Approved' },
      { id: 5, program: 'Name of Program', project: 'Name of Project', activity: 'Accounting', aip: '100-000-2-101-001-000-000', amount: '999,999', status: 'Not yet approved' },
  ]);
    
</script>
   

<template>
     <HeaderMenu />
    <NavBar />
  <div class="w-full text-center">
    <div class="bg-white shadow-md rounded my-6 flex justify-center">
      <table class="min-w-max w-full table-fixed">
        <thead>
          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <td class="py-3 px-6 text-center">   <input  class="" type="checkbox" id="checkbox" v-model="checked" /></td>

            <th class="py-3 px-6 text-left">Name of Program</th>
            <th class="py-3 px-6 text-left">Name of Project</th>
            <th class="py-3 px-6 text-left">Name of Activity</th>
            <th class="py-3 px-6 text-left">AIP Reference</th>
            <th class="py-3 px-6 text-left">Amount</th>
            <th class="py-3 px-6 text-left">Status</th>
         
          </tr>
        </thead>
        <tbody class="text-gray-600 text-sm leading-normal">
          <tr  class="border-b border-gray-200 hover:bg-gray-100" v-for="record in records" :key="record.id">
        
            <td class="py-3 px-6 text-center">   <input  class="" type="checkbox" id="checkbox" v-model="checked" /></td>

<td class="py-3 px-6 text-left">{{ record.program }}</td>
          <td class="py-3 px-6 text-left">{{ record.project }}</td>
          <td class="py-3 px-6 text-left">{{ record.activity }}</td>
          <td class="py-3 px-6 text-left">{{ record.aip }}</td>
          <td class="py-3 px-6 text-left">{{ record.amount }}</td>
        
          <td class="py-3 px-6 text-left text-blue-400"  v-if="record.status === 'Approved'">{{ record.status }}</td>
          <td class="py-3 px-6 text-left text-red-400"  v-else-if="record.status === 'Disapproved'">{{ record.status }}</td>
          <td class="py-3 px-6 text-left text-gray-500"  v-else>{{ record.status }}</td>
        
        
          </tr>
        </tbody>
      </table>
    </div>
    <div class="text-right fluid">
    <v-btn class="bg-red-400 hover:bg-blue-700 text-white  font-bold py-2 px-4 rounded float-right" >
      CANCEL
    </v-btn>

    <v-btn class="bg-blue-500 hover:bg-blue-700 text-uppercase text-white font-bold py-2 px-4 rounded float-right mr-2">
      RE-PROCESS
    </v-btn>
  </div>
  </div>
</template>