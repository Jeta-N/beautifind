<div class="modal fade" id="priceSearchModal" tabindex="-1" aria-labelledby="priceSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="priceSearchModalHeader" class="py-3">Price</h2>
                    <form action="" id="priceFilter">
                        <div class="row row-cols-2 mx-0">
                            <div class="form-check col mb-3 ps-0">
                                <input class="btn-check" type="checkbox" name="price[]" id="priceCheckBox1" value="1">
                                <label class="price-pill cursor-pointer rounded-pill w-100 border p-1" for="priceCheckBox1">
                                    < Rp. 100,000 </label>
                            </div>
                            <div class="form-check col mb-3 ps-0">
                                <input class="btn-check" type="checkbox" name="price[]" id="priceCheckBox2" value="2">
                                <label class="price-pill cursor-pointer rounded-pill w-100 border p-1" for="priceCheckBox2">
                                    Rp. 100,001 - Rp. 300,000
                                </label>
                            </div>
                            <div class="form-check col mb-3 ps-0">
                                <input class="btn-check" type="checkbox" name="price[]" id="priceCheckBox3" value="3">
                                <label class="price-pill cursor-pointer rounded-pill w-100 border p-1" for="priceCheckBox3">
                                    Rp. 300,001 - Rp. 500,000
                                </label>
                            </div>
                            <div class="form-check col mb-3 ps-0">
                                <input class="btn-check" type="checkbox" name="price[]" id="priceCheckBox4" value="4">
                                <label class="price-pill cursor-pointer rounded-pill w-100 border p-1" for="priceCheckBox4">
                                    Rp 500,001 - Rp. 1,000,000
                                </label>
                            </div>
                            <div class="form-check col mb-3 ps-0">
                                <input class="btn-check" type="checkbox" name="price[]" id="priceCheckBox5" value="5">
                                <label class="price-pill cursor-pointer rounded-pill w-100 border p-1" for="priceCheckBox5">
                                    > Rp. 1,000,000
                                </label>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="profile-save-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
