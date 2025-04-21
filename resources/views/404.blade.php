<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h3 class="text-center text-primary mb-4">Calculateur de Coût de Location</h3>
                    <form id="rental-cost-calculator" onsubmit="event.preventDefault(); calculateCost();">
                        <div class="form-group mb-3">
                            <label for="car-type" class="form-label">Type de voiture :</label>
                            <select id="car-type" name="car-type" class="form-select rounded-pill">
                                <option value="economy">Économique (150 MAD/jour)</option>
                                <option value="suv">SUV (300 MAD/jour)</option>
                                <option value="luxury">Luxe (500 MAD/jour)</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="rental-days" class="form-label">Nombre de jours :</label>
                            <input type="number" id="rental-days" name="rental-days" min="1" value="1" class="form-control rounded-pill">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill w-100 py-2">Calculer</button>
                    </form>
                    <p id="rental-cost" class="text-center mt-4 alert alert-info">Coût total : -</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  function calculateCost() {
    const carType = document.getElementById('car-type').value;
    const rentalDays = parseInt(document.getElementById('rental-days').value, 10);

    let dailyRate;
    if (carType === 'economy') {
      dailyRate = 150;
    } else if (carType === 'suv') {
      dailyRate = 300;
    } else if (carType === 'luxury') {
      dailyRate = 500;
    }

    const totalCost = dailyRate * rentalDays;
    document.getElementById('rental-cost').textContent = `Coût total : ${totalCost} MAD`;
  }
</script>
