 <div class="col-md-10">

            @yield('user_content')

            <!-- Modal  Receipts-->
            <div class="modal fade" id="newReceipts" tabindex="-1" role="dialog" aria-labelledby="newReceipts"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Receipt</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('users.receipts.store', $user->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Ammount</label>
                                    <input type="text" class="form-control" name="amount" id="ammount">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Note</label>
                                    <textarea name="note" id="" rows="5" name="note" class="form-control"></textarea>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal payment-->
            <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('users.payments', $user->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Ammount</label>
                                    <input type="text" class="form-control" name="amount" id="ammount">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Note</label>
                                    <textarea name="note" id="" rows="5" name="note" class="form-control"></textarea>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal sales invoice modal -->
            <div class="modal fade" id="newSaleInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New sales Invoice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('users.sale.invoice.store', $user->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" required name="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Chalan Number</label>
                                    <input type="text" class="form-control" name="challan_no" id="ammount">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Note</label>
                                    <textarea name="note" id="" rows="5" name="note" class="form-control"></textarea>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal new Purchase  invoice modal -->
            <div class="modal fade" id="newPurchaseInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New purchase Invoice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('users.purchases.invoice.store', $user->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" required name="date" class="form-control" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Chalan Number</label>
                                    <input type="text" class="form-control" name="challan_no" id="ammount">
                                </div>
                                <div class="form-group">
                                    <label for="ammount">Note</label>
                                    <textarea name="note" id="" rows="5" name="note" class="form-control"></textarea>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
