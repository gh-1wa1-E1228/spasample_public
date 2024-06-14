<script setup lang="ts">
// メタタグ情報のJSONをリアクティブ変数metaDataに入れてメタタグを反映する
import { useMetaData } from '../composables/useMetaData';
const { metaData } = useMetaData('todo');
</script>

<template>
    <h1>ToDoリスト</h1>
</template>