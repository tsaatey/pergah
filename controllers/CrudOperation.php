<?php
require_once '../models/Car.php';
require_once '../models/CarRent.php';
require_once 'DatabaseConnection.php';

class CrudOperation {

    private $connection;

    public function __construct() {
        $db = new DatabaseConnection('localhost', 'root', '');
        $this->connection = $db->ConnectDB();
    }

    public function insertCar(Car $car) {
        try {
            $query = $this->connection->prepare('INSERT INTO car_for_rent(car_name, reg_num, image, availability, price_for_accra, price_for_outside_accra, fuel_terms, driver_terms) '
                    . 'VALUES(:car_name, :reg_num, :image, :availability, :price_for_accra, :price_for_outside_accra, :fuel_terms, :driver_terms)');
            $query->execute([
                'car_name' => $car->getCarName(),
                'reg_num' => $car->getRegNum(),
                'image' => $car->getImage(),
                'availability' => $car->getAvailability(),
                'price_for_accra' => $car->getPriceForAccra(),
                'price_for_outside_accra' => $car->getPriceForOutsideAccra(),
                'fuel_terms' => $car->getFuelTerms(),
                'driver_terms' => $car->getDriverTerms()
            ]);
            return true;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function getCars() {
        try {
            $cars = array();
            $accra = '';
            $outside = '';
            $priceA = '';
            $priceO = '';
            
            $query = $this->connection->prepare("SELECT * FROM car_for_rent ORDER BY id DESC");
            $query->execute();

            while ($result = $query->fetch()) {
                $loc = $result['availability'];
                $pa = $result['price_for_accra'];
                $po = $result['price_for_outside_accra'];
                
                if ($loc == 1) {
                    $accra = 'Yes';
                    $outside = 'No';
                }
                
                if ($loc == 2) {
                    $accra = 'No';
                    $outside = 'Yes';
                }
                
                if ($loc == 3) {
                    $accra = 'Yes';
                    $outside = 'Yes';
                }
                
                if ($pa == 0) {
                    $priceA = 'N/A';
                } else {
                    $priceA = '$' . $pa;
                }
                
                if ($po == 0) {
                    $priceO = 'N/A';
                } else {
                    $priceO = '$' . $po;
                }
                
                $cars[] = array(
                    'id' => $result['id'],
                    'car_name' => $result['car_name'],
                    'reg_num' => $result['reg_num'],
                    'image' => $result['image'],
                    'accra' => $accra,
                    'outside' => $outside,
                    'price_for_accra' => $priceA,
                    'price_for_outside_accra' => $priceO,
                    'fuel_terms' => $result['fuel_terms'],
                    'driver_terms' => $result['driver_terms']
                );
            }
            return $cars;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function saveCarRentDetails(CarRent $carRent) {
        try {
            $query = $this->connection->prepare("INSERT INTO rent_details (carId, customer_name, customer_phone, customer_email, customer_address, car_location, pick_up_date, transaction_date, appended_date_time) "
                    . "VALUES (:carId, :customer_name, :customer_phone, :customer_email, :customer_address, :car_location, :pick_up_date, :transaction_date, :appended_date_time)");
            $query->execute([
                'carId' => $carRent->getCarId(),
                'customer_name' => $carRent->getCustomerName(),
                'customer_phone' => $carRent->getCustomerPhone(),
                'customer_email' => $carRent->getCustomerEmail(),
                'customer_address' => $carRent->getCustomerAddress(),
                'car_location' => $carRent->getCarLocation(),
                'pick_up_date' => $carRent->getPickUpDate(),
                'transaction_date' => $carRent->getTransactionDate(),
                'appended_date_time' => $carRent->getAppendedDateTime()
            ]);
            return true;
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function getCarLocation($carId) {
        try {
            $location = 0;
            $query = $this->connection->prepare("SELECT availability FROM car_for_rent WHERE id = :id");
            $query->execute([
                'id' => $carId
            ]);

            while ($result = $query->fetch()) {
                $location = $result['availability'];
            }
            return $location;
        } catch (Exception $ex) {
            
        }
    }

    public function getRentDetailsForADay() {
        try {
            $query = $this->connection->prepare("SELECT rent_details.customer_name AS 'name', rent_details.customer_phone AS 'phone', "
                    . "rent_details.customer_email AS 'email', rent_details.customer_address AS 'address', rent_details.pick_up_date AS 'date', rent_details.appended_date_time AS 'date_time', car_for_rent.car_name "
                    . "AS 'car' FROM car_for_rent, rent_details WHERE car_for_rent.id = rent_details.carId");
            $query->execute();

            if ($query->rowCount() > 0) {
                ?>
                <table class = "table table bordered striped">
                    <tr>
                        <td>S/N</td>
                        <th>Name of Customer</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Address</th>
                        <th>Pickup Date</th>
                        <th>Name of Car</th>
                        <th>Transac. Date/Time</th>
                    </tr>
                    <?php
                    $counter = 1;
                    while ($result = $query->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['phone']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['address']; ?></td>
                            <td><?php echo $result['date']; ?></td>
                            <td><?php echo $result['car']; ?></td>
                            <td><?php echo $result['date_time']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            } else {
                echo 'No data available currently';
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    public function getTimeboundRentDetails($startDate, $endDate) {
        try {
            $query = $this->connection->prepare("SELECT");
        } catch (Exception $ex) {
            
        }
    }

}
