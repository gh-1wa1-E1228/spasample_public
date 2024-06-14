<script setup lang="ts">

// メタタグ情報のJSONをリアクティブ変数metaDataに入れてメタタグを反映する
import { useMetaData } from '../composables/useMetaData';
const { metaData } = useMetaData('notfound');
</script>
<template>
    <h1>Not Found Page</h1>
</template>