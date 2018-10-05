<script>
    export default {
        name: 'modal',
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }),

        methods: {
            close() {
                this.$emit('close');
            },
        },
    };
</script>
<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal"
                 role="dialog"
                 aria-labelledby="modalTitle"
                 aria-describedby="modalDescription"
            >
                <section class="modal-body" id="modalDescription">
                    <slot name="body">
                        <div class="container">
                            <div style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <h3>Add new token</h3>
                                <form action="/addToken" method="post">
                                    <input type="hidden" name="_token" :value="csrf">
                                    <div class="form-group">
                                        <label for="symbol">Symbol</label>
                                        <input type="text" class="form-control" id="symbol" placeholder="BDG" name="symbol" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="BitDegree" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="homepage">Homepage</label>
                                        <input type="text" class="form-control" id="homepage" placeholder="https://bitdegree.org" name="homepage" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="totalsupply">Total Supply</label>
                                        <input type="text" class="form-control" id="totalsupply" placeholder="550000000" name="totalsupply" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="currentprice">Current Price</label>
                                        <input type="text" class="form-control" id="currentprice" placeholder="0.04556" name="currentprice" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button
                                                type="button"
                                                class="btn btn-danger"
                                                @click="close"
                                                aria-label="Close modal"
                                        >
                                            x
                                        </button>
                                    </div>

                                </form>


                            </div>
                        </div>                    </slot>
                </section>
            </div>
        </div>
    </transition>
</template>
<style>
    .modal-backdrop {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal {
        background: #FFFFFF;
        box-shadow: 2px 2px 20px 1px;
        overflow-x: auto;
        display: flex;
        flex-direction: column;

    }
    .modal2 {
        display: flex;
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-body {
        position: relative;
        padding: 20px 10px;
        overflow-y: scroll;


    }
</style>