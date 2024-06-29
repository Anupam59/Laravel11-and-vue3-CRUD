<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'HomeView'}">Home</RouterLink>
                <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'ListView'}">List</RouterLink>
                <RouterLink class="btn btn-sm btn-primary m-2" :to="{name: 'AboutView'}">About</RouterLink>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="number" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AboutView"
}
</script>

<style scoped>

</style>
