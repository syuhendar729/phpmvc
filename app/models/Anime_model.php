<?php 


class Anime_model{
	private $table = 'anime';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	
	public function getAllAnime()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getAnimeById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
		// $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=' . $id); # Hati2 Bisa kena sql-injection
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataAnime($data)
	{
		$query = "INSERT INTO anime VALUES
		(NULL, :judul, :rating, :genre, :sinopsis)";
		$this->db->query($query);
		$this->db->bind( 'judul', htmlspecialchars($data["judul"]) );
		$this->db->bind( 'rating', htmlspecialchars($data["rating"]) );
		$this->db->bind( 'genre', htmlspecialchars($data["genre"]) );
		$this->db->bind( 'sinopsis', htmlspecialchars($data["sinopsis"]) );

		if ( $data !== NULL && 
			strlen($data["judul"]) <= 128 && 
			strlen($data["genre"]) <= 512 && 
			strlen($data["sinopsis"]) <= 5120 &&
			strlen($data["rating"]) <= 4 
		) 
		{
			$this->db->execute();
		}

		return $this->db->rowCount();
	}

	public function hapusDataAnime($id)
	{
		$query = "DELETE FROM anime WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function ubahDataAnime($data)
	{
		$query = "UPDATE anime SET
		judul = :judul,
		rating = :rating,
		genre = :genre,
		sinopsis = :sinopsis
		WHERE id = :id";
		$this->db->query($query);
		$this->db->bind( 'judul', htmlspecialchars($data["judul"]) );
		$this->db->bind( 'rating', htmlspecialchars($data["rating"]) );
		$this->db->bind( 'genre', htmlspecialchars($data["genre"]) );
		$this->db->bind( 'sinopsis', htmlspecialchars($data["sinopsis"]) );
		$this->db->bind( 'id', htmlspecialchars($data["id"]) );

		if ( $data !== NULL && 
			strlen($data["judul"]) <= 128 && 
			strlen($data["genre"]) <= 512 && 
			strlen($data["sinopsis"]) <= 5120 &&
			strlen($data["rating"]) <= 4
		) 
		{
			$this->db->execute();
		}

		return $this->db->rowCount();	
	}

	public function cariDataAnime()
	{
		// return $_POST["judul"];
		$keyword = htmlspecialchars( $_POST['keyword'] );
		
		$query = "SELECT * FROM anime WHERE judul LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");

		return $this->db->resultSet();

	}
}

