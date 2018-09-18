<template>
    <div>
        <aside class="p-3 border mb-3">
            <form class="form-row">
                <div class="form-group col-12">
                    <label for="in">
                        <img src="/images/suites/icon/calendar.svg" alt="calendar">
                        Check-in
                    </label>
                    <input name="in" type="text" class="form-control" placeholder="19/08/2019">
                </div>
                <div class="form-group col-12">
                    <label for="out">
                        <img src="/images/suites/icon/calendar.svg" alt="calendar">
                        Check-out
                    </label>
                    <input name="out" type="text" class="form-control" placeholder="20/08/2019">
                </div>
                <!--
                <div class="form-group col-12 col-lg-6">
                    <label for="adulti">Adulti</label>
                    <select name="adulti" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="bambino">Bambino</label>
                    <select name="bambino" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>-->
                <div class="form-group col-12 text-center">
                    <button type="button" class="btn btn-primary text-uppercase">
                        Cerca
                    </button>
                </div>
            </form>
        </aside>
    </div>
</template>

<style scoped>
/*form*/
  .form-control {
    display: block;
    width: 100%;
    height: calc(2.19rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    line-height: 1.6;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0rem;
  }
  .reserva{
      border: 1px solid #ccc;
  }
  label{
      font-family: 'Josefin Sans', sans-serif;
  }
</style>

