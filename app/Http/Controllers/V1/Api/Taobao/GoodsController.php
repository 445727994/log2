<?php

namespace App\Http\Controllers\V1\Api\Taobao;

use App\Criteria\Tbk\GoodsCriteria;
use App\Models\Entities\Taobao\Goods;
use App\Tools\Tbk\V1\Taobao;
use Illuminate\Http\Request;
use App\Http\Requests;
use PHPUnit\Exception;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Taobao\GoodsCreateRequest;
use App\Http\Requests\Taobao\GoodsUpdateRequest;
use App\Repositories\Interfaces\Taobao\GoodsRepository;
use App\Validators\Taobao\GoodsValidator;
use App\Http\Controllers\Controller;
/**
 * Class GoodsController.
 *
 * @package namespace App\Http\Controllers\V1\Api\Taobao;
 */
class GoodsController extends Controller
{
    /**
     * @var GoodsRepository
     */
    protected $repository;

    /**
     * @var GoodsValidator
     */
    protected $validator;

    /**
     * GoodsController constructor.
     *
     * @param GoodsRepository $repository
     * @param GoodsValidator $validator
     */
    public function __construct(GoodsRepository $repository, GoodsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(new GoodsCriteria());
        $goods = $this->repository->paginate(20)->all();
        return json(200,'商品信息返回',$goods);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function goodsDetail(Request $request)
    {
        $itemId=$request->get('item_id');
        $type=$request->get('type',1);
        $shopType=$request->get('shop_type');
        //type=1为item_id查询 2复制内容查询
        $good=[];
        if ($type==1) {
            //$good=Goods::query()->select(Goods::Field)->find($itemId."11");
        }
        if(empty($good) ||$good==null){
            $Taobao=new Taobao();
            $good = $Taobao->itemDetail($itemId,$type,$shopType);
        }
        return json(200,'商品详情返回',$good);
    }

}
