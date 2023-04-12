namespace :laravel do
	desc "Setup Laravel Permission Folder"
	task :permission  do
		on roles(:app), in: :sequence, wait: 5 do
			within release_path do 
				execute :chmod,"u+x artisan"
				execute :chmod, "-R 777 app/storage"
			end
		end
		
	end

	desc "Optimize Laravel Class Loader"
	task :optimize do
		on roles(:app), in: :sequence, wait: 5 do 
				within release_path do
					execute :php, "artisan clear-compiled"
					execute :php, "artisan optimize"
					
				end
			
		end
	end

	desc "Running Migration"
	task :migrate  do
		on roles(:app), in: :sequence, wait: 5 do
			within release_path do 
				execute :php,"artisan migrate"
			end
		end
		
	end
	
end

namespace :deploy do
	after :updated "laravel:permission"
	after :updated "laravel:optimize"
	after :updated "laravel:migrate"
end