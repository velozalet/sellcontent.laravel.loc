<div id="formBueUserModalWindow" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buy this book - <b><?=$single_article[0]->alias;?></b> for $ <b><?=$single_article[0]->price;?> </h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/checkout') }}" method="POST" id="payment-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_customer" name="id_customer" value="<?=$if_current_user_registered->id?>">
                    <input type="hidden" id="name_customer" name="name_customer" value="<?=$if_current_user_registered->name?>">
                    <input type="hidden" id="email_customer" name="email_customer" value="<?=$if_current_user_registered->email?>">
                    <input type="hidden" id="price_article" name="price_article" value="<?=$single_article[0]->price;?>">
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button>Submit Payment</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="display:none;">Close</button>
            </div>
        </div>

    </div>
</div>
