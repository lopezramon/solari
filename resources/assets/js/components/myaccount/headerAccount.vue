<template>
    <div>
        <header>
            <div class="container">
                <div class="row mb-0 mb-md-5">
                    <div class="col-12 col-md-6 text-left align-items-center">
                        <img src="/images/logos/user.svg" alt="" class="alto">
                        <h2 class="text-uppercase m-0  d-inline-block text-center ml-3">Jhon Roe</h2>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>
<style scoped>
header{
    background-color: #fff;
    width: 100%;
    height: 130px;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    text-align: center;
}
@media (max-width: 768px) {
    .alto{
        width: 50px;
    }
}
@media (min-width: 768px) {
    header{
        height: 280px;
    }
    .alto{
        width: 100px;
    }
}


</style>