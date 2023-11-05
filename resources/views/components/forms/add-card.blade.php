<form>
    <div class="mb-3">
        <label for="cardType" class="form-label">Card Type:</label>
        <select class="form-select" id="cardType" name="cardType">
            <option value="Visa">Visa</option>
            <option value="Mastercard">Mastercard</option>
            <option value="American Express">American Express</option>
            <!-- Add more card types as needed -->
        </select>
    </div>
    <div class="mb-3">
        <label for="cardNumber" class="form-label">Card Number:</label>
        <input type="text" class="form-control" id="cardNumber" name="cardNumber">
    </div>
    <div class="mb-3">
        <label for="cardHolder" class="form-label">Cardholder Name:</label>
        <input type="text" class="form-control" id="cardHolder" name="cardHolder">
    </div>
    <div class="mb-3">
        <label for="expirationDate" class="form-label">Expiration Date:</label>
        <input type="text" class="form-control" id="expirationDate" name="expirationDate" placeholder="MM/YY">
    </div>
    <div class="mb-3">
        <label for="cvv" class="form-label">CVV:</label>
        <input type="text" class="form-control" id="cvv" name="cvv">
    </div>
    <button type="submit" class="btn btn-primary">Save Card</button>
</form>
