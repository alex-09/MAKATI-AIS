<template>
  <div
    class="px-2 grid grid-cols-8 gap-4 sm:flex-row justify-between items-center text-other-black bg-white font-Inter text-xs font-semibold shadow-lg"
  >
    <div class="flex flex-row items-center text-secondBtn">
      <button @click.prevent="onBackClick()">
        <img src="../../../../public/assets/Go_Back.png" alt="" />
      </button>
      <h1 class="text-2xl capetalize px-2">Outgoing</h1>
    </div>

    <!-- <router-link :to="{ name: 'Budgetary Obligation Transaction Outgoing' }">
      <button class="hover:bg-secondBtn">
        Budgetary Obligation Transaction
      </button>
    </router-link> -->

    <div
      class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
      :class="{
        'bg-none': !['/budgetary-obligation-transaction-outgoing'].includes(
          $route.path
        ),
        'bg-secondBtn text-black': [
          '/budgetary-obligation-transaction-outgoing',
        ].includes($route.path),
      }"
    >
      <Menu as="div" class="relative text-left">
        <MenuButton class="p-1">
          <RouterLink
            :to="{ name: 'Budgetary Obligation Transaction Outgoing' }"
          >
            Budgetary Obligation Transaction
          </RouterLink>
        </MenuButton>
      </Menu>
    </div>

    <div
      class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
      :class="{
        'bg-none': !['/Document-Incoming-Contracts'].includes($route.path),
        'bg-secondBtn text-black': ['/Document-Outgoing-Contracts'].includes(
          $route.path
        ),
      }"
    >
      <Menu as="div" class="relative text-left">
        <MenuButton class="p-3">
          <RouterLink :to="{ name: 'Document Outgoing Contracts' }">
            Contracts / PO
          </RouterLink>
        </MenuButton>
      </Menu>
    </div>

    <div
      class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
      :class="{
        'bg-none': !['/Document-Incoming-PreAudit'].includes($route.path),
        'bg-secondBtn text-black': ['/Document-Outgoing-PreAudit'].includes(
          $route.path
        ),
      }"
    >
      <Menu as="div" class="relative text-left">
        <MenuButton class="p-3">
          <RouterLink :to="{ name: 'Document Outgoing PreAudit' }">
            Pre-Audit Transactions</RouterLink
          >
        </MenuButton>
      </Menu>
    </div>

    <div
      class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
      :class="{
        'bg-none': !['/Document-Outgoing-Payment-Transaction'].includes(
          $route.path
        ),
        'bg-secondBtn text-black': [
          '/Document-Outgoing-Payment-Transaction',
        ].includes($route.path),
      }"
    >
      <Menu as="div" class="relative text-left">
        <MenuButton class="p-3">
          <RouterLink :to="{ name: 'Document Outgoing Payment Transaction' }">
            Payment Transactions</RouterLink
          >
        </MenuButton>
      </Menu>
    </div>

    <div
      class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
      :class="{
        'bg-none': !['/Document-Outgoing-Check-Transaction'].includes(
          $route.path
        ),
        'bg-secondBtn text-black': [
          '/Document-Outgoing-Check-Transaction',
        ].includes($route.path),
      }"
    >
      <Menu as="div" class="relative text-left">
        <MenuButton class="p-3">
          <RouterLink :to="{ name: 'Document Outgoing Check Transaction' }">
            Check Transactions</RouterLink
          >
        </MenuButton>
      </Menu>
    </div>

    <div
      class="duration-150 m-1 flex hover:bg-secondBtn focus:bg-secondBtn rounded-md hover:text-black"
      :class="{
        'bg-none': !['/Document-Outgoing-Communications'].includes($route.path),
        'bg-secondBtn text-black': [
          '/Document-Outgoing-Communications',
        ].includes($route.path),
      }"
    >
      <Menu as="div" class="relative text-left">
        <MenuButton class="p-3">
          <RouterLink :to="{ name: 'Document Outgoing Communications' }">
            Communications</RouterLink
          >
        </MenuButton>
      </Menu>
    </div>

    <div
      class="duration-150 m-1 flex rounded-md hover:text-black hover:bg-secondBtn focus:bg-secondBtn"
      :class="{
        'bg-none': ![
          '/Document-Incoming-More-Payroll',
          '/Document-Incoming-More-RCD',
        ].includes($route.path),
        'bg-secondBtn text-black': [
          '/Document-Incoming-More-RCD',
          '/Document-Incoming-More-Payroll',
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
                  :to="{ name: 'Document Outgoing Payroll Appointment' }"
                  :class="[
                    active ? 'bg-secondBtn text-black' : 'text-gray-700',
                    'block px-4 py-2 ',
                  ]"
                  >Payrolls / Appointment</RouterLink
                >
              </MenuItem>
              <MenuItem v-slot="{ active }">
                <RouterLink
                  :to="{ name: 'Document Outgoing RCD' }"
                  :class="[
                    active ? 'bg-secondBtn text-black' : 'text-gray-700',
                    'block px-4 py-2 ',
                  ]"
                  >Collection and Deposits</RouterLink
                >
              </MenuItem>
              <MenuItem v-slot="{ active }">
                <RouterLink
                  :to="{ name: 'Document Outgoing Others' }"
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
</template>

<script>
import { defineComponent } from "vue";
import { RouterLink } from "vue-router";
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";

export default {
  methods: {
    onBackClick() {
      this.$router.go(-1);
    },
  },
  components: {
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
    RouterLink,
  },
  data() {
    return {
      isOpen: false,
    };
  },
};
</script>
