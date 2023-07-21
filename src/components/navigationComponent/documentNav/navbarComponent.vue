<template>
  <div v-if="userDetails === 'City Accountant'">
    <AccountantMenu />
  </div>
  <div v-else-if="userDetails === 'Approver'">
    <ApproverMenu />
  </div>
  <div v-else-if="userDetails === 'Reviewer'">
    <ReviewerMenu />
  </div>
  <div v-else-if="userDetails === 'Processor'">
    <ProcessorMenu />
  </div>
  <!-- Recieving Clerk Menu -->
  <div v-else-if="userDetails === 'Receiving Clerk'">
    <div
      class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg"
    >
      <div class="flex flex-row items-center text-secondBtn">
        <button @click.prevent="onBackClick()">
          <img src="../../../../public/assets/Go_Back.png" alt="" />
        </button>
        <h1 class="text-2xl capetalize px-2">Incoming</h1>
      </div>

      <div
        class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
        :class="{
          'bg-none': !['/budgetary-obligation-transaction'].includes(
            $route.path
          ),
          'bg-secondBtn text-black': [
            '/budgetary-obligation-transaction',
            '/Incoming',
          ].includes($route.path),
        }"
      >
        <Menu as="div" class="relative text-left">
          <MenuButton class="p-3">
            <RouterLink :to="{ name: 'Budgetary Obligation Transaction' }">
              Budgetary Obligation Transaction
            </RouterLink>
          </MenuButton>
        </Menu>
      </div>

      <div
        class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
        :class="{
          'bg-none': !['/Document-Incoming-Contracts'].includes($route.path),
          'bg-secondBtn text-black': ['/Document-Incoming-Contracts'].includes(
            $route.path
          ),
        }"
      >
        <Menu as="div" class="relative text-left">
          <MenuButton class="p-3">
            <RouterLink :to="{ name: 'Document Incoming Contracts' }">
              Contracts / PO
            </RouterLink>
          </MenuButton>
        </Menu>
      </div>

      <div
        class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
        :class="{
          'bg-none': !['/Document-Incoming-PreAudit'].includes($route.path),
          'bg-secondBtn text-black': ['/Document-Incoming-PreAudit'].includes(
            $route.path
          ),
        }"
      >
        <Menu as="div" class="relative text-left">
          <MenuButton class="p-3">
            <RouterLink :to="{ name: 'Document Incoming PreAudit' }">
              Pre-Audit Transactions</RouterLink
            >
          </MenuButton>
        </Menu>
      </div>

      <div
        class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
        :class="{
          'bg-none': !['/Document-Incoming-Payment-Transaction'].includes(
            $route.path
          ),
          'bg-secondBtn text-black': [
            '/Document-Incoming-Payment-Transaction',
          ].includes($route.path),
        }"
      >
        <Menu as="div" class="relative text-left">
          <MenuButton class="p-3">
            <RouterLink :to="{ name: 'Document Incoming Payment Transaction' }">
              Payment Transactions</RouterLink
            >
          </MenuButton>
        </Menu>
      </div>

      <div
        class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
        :class="{
          'bg-none': !['/Document-Incoming-Check-Transaction'].includes(
            $route.path
          ),
          'bg-secondBtn text-black': [
            '/Document-Incoming-Check-Transaction',
          ].includes($route.path),
        }"
      >
        <Menu as="div" class="relative text-left">
          <MenuButton class="p-3">
            <RouterLink :to="{ name: 'Document Incoming Check Transaction' }">
              Check Transactions</RouterLink
            >
          </MenuButton>
        </Menu>
      </div>

      <div
        class="duration-150 m-1 flex rounded-md hover:text-black hover:bg-secondBtn focus:bg-secondBtn"
        :class="{
          'bg-none': !['/Document-Incoming-Communication-Receiving'].includes(
            $route.path
          ),
          'bg-secondBtn text-black': [
            '/Document-Incoming-Communication-Receiving',
            '/Document-Incoming-Communication-Create',
          ].includes($route.path),
        }"
      >
        <Menu as="div" class="relative text-left">
          <MenuButton class="p-3"> Communications </MenuButton>

          <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
          >
            <MenuItems
              class="absolute left-0 z-10 mt-1 w-223 origin-top-right rounded-md bg-white shadow-md font-normal text-sm"
            >
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <RouterLink
                    :to="{ name: 'Document Incoming Communication Receive' }"
                    :class="[
                      active ? 'bg-secondBtn text-black' : 'text-gray-700',
                      'block px-4 py-2',
                    ]"
                    >Receive Communication</RouterLink
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <RouterLink
                    :to="{ name: 'Document Incoming Communication Create' }"
                    :class="[
                      active ? 'bg-secondBtn text-black' : 'text-gray-700',
                      'block px-4 py-2',
                    ]"
                    >Create Communication</RouterLink
                  >
                </MenuItem>
              </div>
            </MenuItems>
          </transition>
        </Menu>
      </div>

      <div
        class="duration-150 m-1 flex rounded-md hover:text-black hover:bg-secondBtn focus:bg-secondBtn"
        :class="{
          'bg-none': ![
            '/Document-Incoming-More-Payroll',
            '/Document-Incoming-More-RCD',
            '//Document-Incoming-More-Others',
          ].includes($route.path),
          'bg-secondBtn text-black': [
            '/Document-Incoming-More-RCD',
            '/Document-Incoming-More-Payroll',
            '/Document-Incoming-More-Others',
          ].includes($route.path),
        }"
      >
        <Menu as="div" class="relative text-left">
          <MenuButton class="p-3"> More </MenuButton>

          <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
          >
            <MenuItems
              class="absolute left-0 z-10 mt-1 w-175 xxxxl:w-223 origin-top-right rounded-md bg-white shadow-md font-normal text-sm"
            >
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <RouterLink
                    :to="{ name: 'Document Incoming Payroll' }"
                    :class="[
                      active ? 'bg-secondBtn text-black' : 'text-gray-700',
                      'block px-4 py-2 ',
                    ]"
                    >Payrolls / Appointment</RouterLink
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <RouterLink
                    :to="{ name: 'Document Incoming RCD' }"
                    :class="[
                      active ? 'bg-secondBtn text-black' : 'text-gray-700',
                      'block px-4 py-2 ',
                    ]"
                    >RCD / ORs / Income Related Docs</RouterLink
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <RouterLink
                    :to="{ name: 'Document Incoming Others' }"
                    :class="[
                      active ? 'bg-secondBtn text-black' : 'text-gray-700',
                      'block px-4 py-2 ',
                    ]"
                    >Others</RouterLink
                  >
                </MenuItem>
              </div>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { RouterLink } from "vue-router";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import axios from "axios";

import AccountantMenu from "./accountantNav.vue";
import ApproverMenu from "./approverNav.vue";
import ReviewerMenu from "./reviewerNav.vue";
import ProcessorMenu from "./processorNav.vue";

export default {
  methods: {
    onBackClick() {
      this.$router.go(-1);
    },
  },
  components: {
    AccountantMenu,
    ApproverMenu,
    ReviewerMenu,
    ProcessorMenu,

    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
    RouterLink,
  },
  data() {
    return {
      isOpen: false,
      userRole: "",
      userDetails: "",
    };
  },
  mounted() {
    this.userRole = this.$route.params.userRole;
  },
  async created() {
    const response = await axios.get("me");

    this.userDetails = response.data.user.userdesignation;
  },
};
</script>
