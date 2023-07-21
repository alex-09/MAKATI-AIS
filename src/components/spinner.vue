<template>
    <div class="flex justify-center items-center h-[100vh]">
      <div class="spinner"></div>
    </div>
</template>
  
<style>
  .spinner {
    border-top-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    border-left-color: currentColor;
    animation: spin 1s infinite linear;
    border-radius: 50%;
    border-width: 10px;
    width: 100px;
    height: 100px;
    color: #0E4572;
  }
  
  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  </style>