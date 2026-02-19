<script setup lang="ts">
const props = defineProps({
  handleClick: {
    type: Function,
    required: true
  }
})

const ToggleModal = () => {
  props.handleClick()
}

</script>

<template>
    <button class="p-4 fixed right-6 bottom-6 rounded-md z-1 bg-primary!" @click="ToggleModal">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </button>
</template>
