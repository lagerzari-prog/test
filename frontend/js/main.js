const API_BASE = 'http://localhost/backend/api';

// Функция для получения списка автомобилей
async function loadCars() {
    try {
        const response = await fetch(${API_BASE}/get_cars.php);
        const data = await response.json();
        return data.data || [];
    } catch (error) {
        console.error('Error loading cars:', error);
        return [];
    }
}

// Функция для отображения автомобилей
function displayCars(cars) {
    const container = document.getElementById('cars-container');
    container.innerHTML = cars.map(car => 
        <div class="car-card">
            <h3>${car.brand} ${car.model}</h3>
            <p>Тип: ${car.body_type}</p>
            <p>Цена: ${car.daily_rate} руб/день</p>
            <button onclick="rentCar(${car.id})">Арендовать</button>
        </div>
    ).join('');
}