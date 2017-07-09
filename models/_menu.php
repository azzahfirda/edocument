<?php
class _Menu extends Model {
    public $parent;
    public $id;
    public $mname;
    public $url;
    public $icon;
    public $status;
    public $children = [];

    function __construct($id, $parent = null) {
        $db = DB_ENGINE;
        parent::__construct(new $db);
        return $this->getMenu($id, $parent);
    }
    private function getMenu($id = null, $parent = null) {
        $sql = "select * from _menu";
        if ($id) {
            $arrwhere[] = "id = $id";
        }

        if ($parent) {
            $arrwhere[] = "mparent = $parent";
        }

        $where = implode($arrwhere, ' and ');
        $sql = "$sql where status = 1 and $where";
        $result = $this->_db->Exec($sql);
        if (empty($result)) {
            return false;
        }

        $this->parent = $result[0]->mparent;
        $this->id = $result[0]->id;
        $this->mname = $result[0]->mname;
        $this->url = $result[0]->url;
        $this->icon = $result[0]->icon;
        $this->status = $result[0]->status;
        $this->getChildren();
    }
    private function getChildren() {
        $sql = "select * from _menu inner join _menugroup on _menu.id = _menugroup.idmenu where status = '1' and mparent = $this->id";
        $result = $this->_db->Exec($sql);
        if (empty($result)) {
            return false;
        }

        foreach ($result as $r) {
            $this->children[] = new _Menu($r->id);
        }
    }
}
