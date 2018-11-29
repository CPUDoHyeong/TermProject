<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Log;
use App\Http\Requests\UpdateBoardRequest;

class BBSController extends Controller
{

   public function index(Request $request) {

    $currentPage = $request->get("page");
    // http://localhost/bbs/board.php?page=-3
    if($currentPage < 1) 
    	$currentPage = 1;

	// 집단함수, aggregate function
	// select count(*) from board;
	// 라라벨 db접근 3가지중 3번쨰 방법 사용
	// 간단하게 아래를 실행하면 board 테이블에 records 를 반환해준다.
	$totalCount = Board::count();
	$totalMsgs = $totalCount;
	$startPage = 1;
	$endPage = 1;
	$totalPages = 1; 
	$prev = false;
	$next = false;
	$msgs = null;

	if($totalCount > 0) {
	
			$startPage = floor(($currentPage-1)/10)*10+1;	
			$endPage = $startPage + 10 - 1;
			
			$totalPages = ceil($totalMsgs/10);
			if ($endPage > $totalPages)
				$endPage = $totalPages;

			$prev = false;
			$next = false;

			if ($startPage > 1) $prev = true;
	
			$startRecord = ($currentPage-1)*10;	
			//$msgs = $dao->getManyMsgs();
			//$msgs = $dao->getMsgs4Page($startRecord, NUM_LINES);
			$msgs = Board::orderBy('id', 'desc')->skip($startRecord)->take(10)->get();
		}

		// 로그를 남긴다.
		// 정보를 남기기 위해서 로그를 사용하기도 함. 그래서 아래 보면 info임. info를 하면
		// 디버그는 안남고 인포 이상만 다 남는다.
		// 현업에서는 로그를 남긴다.
		Log::info('index 함수', [
			'startPage'=>$startPage,
			'endPage'=>$endPage,
			'totalPages'=>$totalPages,
			'totalCount'=>$totalCount,
		]);
		return view('bbs.board')
			       ->with('startPage', $startPage)
			       ->with('endPage', $endPage)
			       ->with('totalPages', $totalPages)
			       ->with('currentPage', $currentPage)
			       ->with('msgs', $msgs);

   }

   public function show(Request $request) {

		// 특정 글의 상세보기 

		/* 
			request에서 글의 id를 추출
			해당 번호의 글을 읽고, 조회 수 1 증가 
			읽은 글을 출력한다.

		*/
		$id = $request->id;
		$page = $request->page;
		
		// $msg = $dao->getMsg($id);	
		$msg = Board::find($id);
		// select * from boards where id = ? << 이걸 실행함 ...!!
		// 변경할 수 있는 칼럼을 미리 지정해야함.
		// 화이트 리스트 또는 블랙리스트가 있음.
		$msg->update(["Hits"=>$msg->Hits+1]);
		// 위 방법은 될지 모르겠지만 아래 방법으로 한다.
		/* $msg->Hits += 1;

		// 그리고 DB에 반영
		$msg->save(); */

		// $dao->increaseHits($id);

		return view('bbs.view')->with('id', $id)->with('page', $page)->with('msg', $msg);

   }

   public function create() {
   	// 작성 폼으로 연결

   	return view('bbs.write_form');
   }

   public function store(Request $request) {
	   	// DB에 삽입
	    $title = $request->title;
	    $writer = $request->writer;
	    $content = $request->content;

	    $page = $request->page;

		// 규칙이 여러개면 | 를 통해서 나열하면 된다.
		$this->validate($request, ['title'=>'required' ,
									'writer'=>'required',
									'content'=>'required'
									]);
	        // $bdao = new boardDao();
			//$bdao->insertMsg($title, $writer, $content);
			
			// 배열형태로 칼럼을 넣는다.
		$b = Board::create([
			'Title'=>$title,
			'Writer'=>$writer,
			'Content'=>$content,
		]);
		// okGo("정상적으로 입력되었습니다.", "bbs?page=$page");
		return redirect('bbs?page=$page')->with('message', $title . '이 정상적으로 입력되었습니다. ');
	    	
   }

   public function edit(Request $request) {
   	// 갱신 폼으로 연결
		/*
			1. 클라이언트가 송신한 num 값을 읽는다.
			2. 그 값으로 해당하는 게시글을 읽는다.
			3. 그 게시글 정보를 이용해 html을 동적으로 생성한다. 
		*/
			$num = $request->num;
	   		$page = $request->page;
			// $dao = new boardDao();
			// $row = $dao->getMsg($num);
			$row = Board::find($num);

			return view('bbs.modify_form')->with('num', $num)->with('page', $page)->with('row', $row);
   }

   public function update(UpdateBoardRequest $request) {
   	// 갱신 작업 수행 

	    $num = $request->num;
	    $title = $request->title;
	    $writer = $request->writer;
	    $content = $request->content;

	    $page = $request->page;

	    if($num && $title && $writer && $content){
	        // $bdao = new boardDao();
	        // $bdao->updateMsg($num, $title, $writer, $content);
			// okGo("정상적으로 수정되었습니다.", "bbs?page=$page");
			
			// 기존에 있는 것을 가지고 온다.
			$b = Board::find($num);
			$b->update([
				'Title' => $title,
				'Writer' => $writer,
				'Content' => $content,
			]);
	        return redirect('bbs?page=$page')->with('message', $num . '글이 정상적으로 수정되었습니다.');
	    }else{
	        // errorBack('모든 항목이 빈칸 없이 입력되어야 합니다.');
	    }  	
   }

   public function destroy(Request $request) {

	$num = $request->num;
	$page = $request->page;
	// $dao = new BoardDao();
	// $dao->deleteMsg($num);

	$b = Board::find($num);
	$b->delete();

	return redirect('bbs?page=$page')->with('message', $num . "번 글이 삭제되었습니다.");
   }


}
