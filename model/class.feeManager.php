<?php
class FeeManager {

    public function GetList() {
        $tsql = "SELECT * FROM fee";
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetListByProductId($productId) {
        $tsql = "SELECT fee.*, product_fee.value as Value 
                    FROM fee LEFT JOIN product_fee 
                    ON fee.Id = product_fee.feeId And product_fee.productId = ?
                    ORDER BY fee.SortOrder";
        $params = array($productId);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetById($Id) {
        $tsql = "SELECT * FROM fee WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params)[0];
    }

    public function Add($model) {
        $tsql = "INSERT INTO fee(Name, SortOrder) VALUES(?, ?) "; 
        $params = array($model['Name'], $model['SortOrder']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($model) {
        $tsql = "UPDATE fee SET Name = ?, SortOrder = ? WHERE Id = ? ";
        $params = array($model['Name'], $model['SortOrder'], $model['Id']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = "DELETE FROM fee WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function CheckExistFeeFromProduct($productId, $feeId)
    {
        $tsql = "SELECT COUNT(*) AS CNT FROM product_fee WHERE productId = ? And feeId = ? ";
        $params = array($productId, $feeId);
        $database_Model = new Database();
        $result = $database_Model->ExecuteScalar($tsql, $params);
        return $result > 0;
    }

    public function AddFeeToProduct($productId, $feeId, $value)
    {
        $tsql = "INSERT INTO product_fee(productId,feeId,value) VALUES(?,?,?) ";
        $params = array($productId, $feeId, $value);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function UpdateOrInsertFeeProduct($productId, $feeId, $value)
    {
        if($this->CheckExistFeeFromProduct($productId, $feeId))
        {
            $tsql = "UPDATE product_fee Set value = ? Where productId = ? AND feeId = ?";
            $params = array($value, $productId, $feeId);
            $database_Model = new Database();
            return $database_Model->Execute($tsql, $params);
        }
        else 
        {
            return $this->AddFeeToProduct($productId, $feeId, $value);
        }
    }

    public function DeleteFeeFromProduct($productId, $feeId)
    {
        $tsql = "DELETE FROM product_fee WHERE productId = ? AND feeId = ? ";
        $params = array($productId, $feeId);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($Name, $SortOrder) {
        $errors = array();
        if (empty($Name)) {
            $errors[] = "Tên phí không được để trống!";
        }
        if (!is_numeric($SortOrder)) {
            $errors[] = "Thứ tự phải là 1 con số!";
        }
        return $errors;
    }

}
